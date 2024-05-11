<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

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

        Product::create($request->validated());
        Alert::toast('The product was created successfully.', 'success');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('sub_category:id,created_at', 'product_unit:id,id',);

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
        $product->load('sub_category:id,created_at', 'product_unit:id,id',);

        return view('products.edit', compact('product'));
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

        $product->update($request->validated());
        Alert::toast('The product was updated successfully.', 'success');
        return redirect()
            ->route('products.index');
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
}
