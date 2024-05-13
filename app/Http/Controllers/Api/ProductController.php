<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        return response()->json([
            'products' => Product::where('nama_produk', 'LIKE', '%' . $request->q . '%')->limit(4)->get()->map(function ($product) {
                $product->images = ProductPhoto::where('produk_id', $product->id)->orderBy('id', 'ASC')->get();

                return $product;
            })
        ]);
    }
}
