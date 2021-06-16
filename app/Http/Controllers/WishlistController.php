<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = 1;
        return view('frontend.user.view_wishlist');
    }
    public function store(Request $request)
    {
     
            $wishlist = Wishlist::where('product_id', $request->id)->first();
            if($wishlist == null){
                $wishlist = new Wishlist;  
                $wishlist->producto_id = $request->id;
                $wishlist->save();
            }
            return view('frontend.partials.wishlist');
        
    }
}
