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
        $products = DB::table('products')->paginate(9);
        return view('FrontEnd.produk',[
            'setting' => $setting,
            'produkCategory' => $produkCategory,
            'products' => $products
        ]);
    }
}
