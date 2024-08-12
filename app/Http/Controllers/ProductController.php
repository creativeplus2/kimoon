<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product view')->only('index', 'show');
        $this->middleware('permission:product create')->only('create', 'store');
        $this->middleware('permission:product edit')->only('edit', 'update');
        $this->middleware('permission:product delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $products = DB::table('products')
                ->select('products.*', 'sub_categories.nama_sub_kategori', 'product_units.nama_unit')
                ->leftJoin('sub_categories', 'products.sub_kategori_id', '=', 'sub_categories.id')
                ->leftJoin('product_units', 'products.produk_unit_id', '=', 'product_units.id')
                ->get();
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('deksripsi_produk', function ($row) {
                    return str($row->deksripsi_produk)->limit(100);
                })
                ->addColumn('sub_category', function ($row) {
                    return $row->nama_sub_kategori;
                })->addColumn('product_unit', function ($row) {
                    return $row->nama_unit;
                })->addColumn('action', 'products.include.action')
                ->toJson();
        }

        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $attr = $request->validated();
            $attr['slug_produk'] = Str::slug($request->nama_produk);
            $produk = Product::create($attr);
            if ($produk) {
                $insertedId = $produk->id;
                $files = $request->file('photo');
                if ($request->hasFile('photo')) {
                    foreach ($files as $file) {
                        $name = $file->hashName();
                        $file->storeAs('public/produk', $name);
                        DB::table('products_photo')->insert([
                            'produk_id' => $insertedId,
                            'photo' => $name,
                        ]);
                    }
                }
            }
            Alert::toast('The product was created successfully.', 'success');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            Log::error('Error occurred while storing product: ' . $e->getMessage());
            Alert::toast('An error occurred while creating the product.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
            ->select('products.*', 'sub_categories.nama_sub_kategori', 'product_units.nama_unit')
            ->leftJoin('sub_categories', 'products.sub_kategori_id', '=', 'sub_categories.id')
            ->leftJoin('product_units', 'products.produk_unit_id', '=', 'product_units.id')
            ->where('products.id', $id)
            ->first();
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('sub_category:id,created_at', 'product_unit:id,id');
        $photo = DB::table('products_photo')
            ->where('produk_id', '=', $product->id)
            ->get();

        return view('products.edit', compact('product', 'photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try {
            if ($request->id_asal == null) {
                $tidak_terhapus = [];
            } else {
                $tidak_terhapus = $request->id_asal;
            }
            $unlink_db_gambar = DB::table('products_photo')
                ->where('produk_id', '=', $product->id)
                ->whereNotIn('id', $tidak_terhapus)
                ->get();
            foreach ($unlink_db_gambar as $row) {
                DB::table('products_photo')->where('id', $row->id)->delete();
                Storage::disk('local')->delete('public/produk/' . $row->photo);
            }
            $produk = Product::findOrFail($product->id);
            if ($produk) {
                $attr = $request->validated();
                $attr['slug_produk'] = Str::slug($request->nama_produk);

                $product->update($attr);
                $insertedId = $produk->id;
                $files = $request->file('photo');
                if ($request->hasFile('photo')) {
                    foreach ($files as $file) {
                        $name = $file->hashName();
                        $file->storeAs('public/produk', $name);
                        DB::table('products_photo')->insert([
                            'produk_id' => $insertedId,
                            'photo' => $name,
                        ]);
                    }
                }
                Alert::toast('Data berhasil diupdate', 'success');
                return redirect()->route('products.index');
            } else {
                Alert::toast('Data tidak ditemukan', 'error');
                return redirect()->route('products.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data gagal diupdate: ' . $th->getMessage(), 'error');
            return redirect()->route('products.index');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            Alert::toast('The product was deleted successfully.', 'success');
            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            Alert::toast('The product cant be deleted because its related to another table.', 'error');
            return redirect()->route('products.index');
        }
    }

    public function GetGambarProduk($id)
    {
        $data = DB::table('products_photo')
            ->where('produk_id', '=', $id)
            ->get();
        $output = '';
        $output .= '<div class="carousel-inner">';
        $no = 1;
        foreach ($data as $row) {
            $output .= ' <div class="carousel-item ' . $this->active($no) . '"><img class="d-block w-100"
            src="' . Storage::url('public/produk/' . $row->photo) . '" />
            </div>
          ';
            $no++;
        }
        $output .= '</div>';
        echo $output;
    }

    public function active($no)
    {
        if ($no == 1) {
            return "active";
        }
    }
}
