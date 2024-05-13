<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $setting = SettingApp::find(1);
        $produkCategory = DB::table('product_categories')->get();
        $productsQuery = DB::table('products');
        $products = $productsQuery->when($request->has('sub_categori'), function ($query) use ($request) {
            return $query->where('sub_kategori_id', $request->input('sub_categori'));
        })->paginate(9);

        return view('FrontEnd.produk', [
            'setting' => $setting,
            'produkCategory' => $produkCategory,
            'products' => $products
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
        return view('FrontEnd.produk-detail', [
            'setting' => $setting,
            'product' => $product
        ]);
    }
}
