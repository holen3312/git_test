<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();

        if ($products) {
            return response()->json($products, 200);
        }
    }

    public function showOne($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "Status code" => false,
                "Status Text" => "Product not found"
            ])->setStatusCode(404, 'Product not found!');
        }
        return response()->json($product );
    }
}
