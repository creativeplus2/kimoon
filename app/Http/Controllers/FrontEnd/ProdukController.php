<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\ProductPhoto;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Page;


class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::where('title', '=', 'product')->firstOrFail();

        $setting = SettingApp::find(1);
        $produkCategory = DB::table('product_categories')->get();
        $productsQuery = DB::table('products');
        $products = $productsQuery->when($request->has('sub_categori'), function ($query) use ($request) {
            return $query->where('sub_kategori_id', $request->input('sub_categori'));
        })->paginate(9);

        $products = tap($products, function ($paginatedInstance) {
            return $paginatedInstance->getCollection()->transform(function ($product) {
                $product->images = ProductPhoto::where('produk_id', $product->id)->orderBy('id', 'ASC')->get();

                return $product;
            });
        });
        // dd($products);

        return view('FrontEnd.produk', [
            'setting' => $setting,
            'produkCategory' => $produkCategory,
            'products' => $products,
            'text' => $page->content
        ]);
    }

    public function detail($id)
    {


        $setting = SettingApp::find(1);
        $product = DB::table('products')
            ->select('products.*', 'sub_categories.nama_sub_kategori', 'product_units.nama_unit', 'product_categories.nama_kategori')
            ->leftJoin('sub_categories', 'products.sub_kategori_id', '=', 'sub_categories.id')
            ->leftJoin('product_units', 'products.produk_unit_id', '=', 'product_units.id')
            ->leftJoin('product_categories', 'sub_categories.categori_id', '=', 'product_categories.id')
            ->where('products.id', $id)
            ->first();

        $product->images = ProductPhoto::where('produk_id', $product->id)->orderBy('id', 'ASC')->get();
        // if (Session::get('login-member')) {
        //     switch (Session::get('type-user')) {
        //         case ('Distributor'):
        //             $harga = $product->harga_distributor;
        //             break;
        //         case ('Subdis'):
        //             $harga = $product->harga_subdis;
        //             break;
        //         case ('Reseller'):
        //             $harga = $product->harga_reseller;
        //             break;
        //         default:
        //             $harga = '';
        //     }
        // } else {
        //     $harga = $product->harga_umum;
        // }
        return view('FrontEnd.produk-detail', [
            'setting' => $setting,
            'product' => $product,
            // 'harga' => $harga,
        ]);
    }
}
