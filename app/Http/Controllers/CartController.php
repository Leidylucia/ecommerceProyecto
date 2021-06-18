<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImagen;
use App\ProductTarifa;
class CartController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.view_cart');
    }

    public function showCartModal(Request $request)
    {
        $product = Product::where('productosid',$request->productosid)
                    ->first();
        $precioProducto = ProductTarifa::where('productosid',$request->productosid)->first();  
        $imagenProducto =  ProductImagen::select('productos_imagenes.imagen')
                                                    ->join('productos','productos.productosid','=','productos_imagenes.productosid')
                                                    ->where('productos.productosid','=',$request->productosid)
                                                    ->get();
        $min_qty = 1;                                            
        return view('frontend.partials.addToCart', compact('product','precioProducto','imagenProducto','min_qty'));
    }


    public function addToCart(Request $request)
    {
        /* $product = Product::where('productosid',$request->productosid)->first();
        $carts = array();
        $data = array();

        $data['product_id'] = $product->productosid;
        
        $price = $product->unit_price;
     
        $inFlashDeal = false;


        $data['quantity'] = $request['quantity'];
        $data['price'] = $price;

        $data['shipping_cost'] = 0;
        $data['product_referral_code'] = null;


        if ($request['quantity'] == null){
            $data['quantity'] = 1;
        }


        if($carts && count($carts) > 0){
            $foundInCart = false;

            foreach ($carts as $key => $cartItem){
                if($cartItem['product_id'] == $request->id) {
                    $product_stock = $product->stocks->where('variant', $str)->first();
                    $quantity = $product_stock->qty;
                    if($quantity < $cartItem['quantity'] + $request['quantity']){
                        return array('status' => 0, 'view' => view('frontend.partials.outOfStockCart')->render());
                    }
                    if(($str != null && $cartItem['variation'] == $str) || $str == null){
                        $foundInCart = true;
                        
                        $cartItem['quantity'] += $request['quantity'];
                        $cartItem->save();
                    }
                }
            }
            if (!$foundInCart) {
                Cart::create($data);
            }
        }
        else{
            Cart::create($data);
        }

        return array('status' => 1, 'view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render());
 */    }

}
