<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $products)
    {
        return view('product.list', ['products' => $products->listing()->paginate(25)]);
    }

    public function updatePrice(Request $req)
    {
        $product = Product::find($req->id);
        $product->price = (int)$req->price;
        $saved = $product->save();
        if (!$saved) {
            return response()->json([
                'result' => false,
                'message' => __('product.price_update_error')
            ]);
        }
        return response()->json([
            'result' => true,
            'message' => __('product.price_update_success')
        ]);
    }
}
