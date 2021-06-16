<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.view_cart');
    }

    public function showCartModal(Request $request)
    {
        $product = Product::find($request->productosid);
        return view('frontend.partials.addToCart', compact('product'));
    }

}
