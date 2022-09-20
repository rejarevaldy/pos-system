<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAjax extends Controller
{
    public function products()
    {
        return response()->json(Product::all());
    }

    public function getProductCode($code)
    {
        $product = Product::where('product_code', $code)->first();
        return response()->json(['product' => $product]);
    }
}
