<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function search(Request $request)
    {
       

        return view('frontend.customer_product_listing');
    }
}
