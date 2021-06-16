<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Product;
use App\ProductImagen;
use App\ProductTarifa;

class HomeController extends Controller
{
    public function index(){
        return view("frontend.index");
    }
    public function load_featured_section(){
        $products= Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
                ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                ->leftjoin('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                ->where('productos_tarifas.tarifasid','=','1')
                ->where('productos_imagenes.principal','=','1')
                ->get();

        return view('frontend.partials.featured_products_section',compact('products'));
    }
    public function load_best_selling_section(){
        $products= Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
        ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
        ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
        ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
        ->where('productos_tarifas.tarifasid','=','1')
        ->where('productos_imagenes.principal','=','1')
        ->get();

        return view('frontend.partials.best_selling_section',compact('products'));
    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('frontend.user_login');
    }

    public function registration(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
    
        return view('frontend.user_registration');
    }
    public function all_categories(Request $request)
    {
        $categories = Category::get();
        return view('frontend.all_category',compact('categories'));
    }

    public function product($productosid)
    {
        $detallesProducto = Product::where('productosid',$productosid)->first(); 
        $precioProducto = ProductTarifa::where('productosid',$productosid)->first();  
        $imagenProducto =  ProductImagen::select('productos_imagenes.imagen')
                                        ->join('productos','productos.productosid','=','productos_imagenes.productosid')
                                        ->where('productos.productosid','=',$productosid)
                                        ->get();   

        return view('frontend.product_details',compact('detallesProducto','precioProducto','imagenProducto'));
    }
    public function terms(){
        return view("frontend.policies.terms");
    }

    public function privacypolicy(){
        return view("frontend.policies.privacypolicy");
    }
   public function returnpolicy(){
        return view("frontend.policies.returnpolicy");
    }

    public function supportpolicy(){
        return view("frontend.policies.supportpolicy");
    }

    public function listingByCategory(Request $request,$productos_categoriasid)
    {
        $category = Category::where('productos_categoriasid', $productos_categoriasid)->first();

        if ($category != null) {
            return $this->search($request,$category->productos_categoriasid);
        }
        abort(404);
    }
    public function search(Request $request,$productos_categoriasid = null)
    {
        $query = $request->q;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        
        $products= Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
        ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
        ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
        ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
        ->where('productos_tarifas.tarifasid','=','1')
        ->where('productos_imagenes.principal','=','1')
        ->get();


        if($productos_categoriasid!= null){
            $products = Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen','productos_categorias.descripcion')
                        ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                        ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                        ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                        ->join('productos_categorias','productos_categorias.productos_categoriasid','=','productos.productos_categoriasid')
                        ->where('productos.productos_categoriasid','=',$productos_categoriasid)
                        ->where('productos_tarifas.tarifasid','=','1')
                        ->where('productos_imagenes.principal','=','1')
                        ->get();
        }

        if($min_price != null && $max_price != null){
            $products = $products->where('productos_tarifas.precio', '>=', $min_price)->where('productos_tarifas.precio', '<=', $max_price);
        }

        if($query != null){
           
            $products = $products->where('productos_tarifas.precio', 'like', '%'.$query.'%');
        }


        return view('frontend.product_listing', compact('products','productos_categoriasid','min_price', 'max_price'));
    }

}
