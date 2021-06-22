<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductImagen;
use App\ProductTarifa;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use App\User;

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
        $min_qty = 1;

        return view('frontend.product_details',compact('detallesProducto','precioProducto','imagenProducto','min_qty'));
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
            return $this->search($request,$productos_categoriasid);
        }
        abort(404);
    }
    public function search(Request $request,$productos_categoriasid = null )
    {
        $query = $request->q;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        if($productos_categoriasid!= null){
            $preciomaximo = Product::select('productos_tarifas.precio')
                ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                ->where('productos.productos_categoriasid','=',$productos_categoriasid)
                ->where('productos_tarifas.tarifasid','=','1')
                ->max('productos_tarifas.precio');
            $preciominimo = Product::select('productos_tarifas.precio')
                ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                ->where('productos.productos_categoriasid','=',$productos_categoriasid)
                ->where('productos_tarifas.tarifasid','=','1')
                ->min('productos_tarifas.precio');

            $products = Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
                ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                ->join('productos_categorias','productos_categorias.productos_categoriasid','=','productos.productos_categoriasid')
                ->where('productos.productos_categoriasid','=',$productos_categoriasid)
                ->where('productos_tarifas.tarifasid','=','1')
                ->where('productos_imagenes.principal','=','1')
                ->get();
            
        }else{
            $preciomaximo = ProductTarifa::where('precio','>=','0')->max('precio');
            $preciominimo = ProductTarifa::where('precio','>=','0')->min('precio');
            $products= Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
            ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
            ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
            ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
            ->where('productos_tarifas.tarifasid','=','1')
            ->where('productos_imagenes.principal','=','1')
            ->get();
        }

        if($min_price != null && $max_price != null && $productos_categoriasid!= null ){
            $products =         Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
                                ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                                ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                                ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                                ->join('productos_categorias','productos_categorias.productos_categoriasid','=','productos.productos_categoriasid')
                                ->where('productos.productos_categoriasid','=',$productos_categoriasid)
                                ->where('productos_tarifas.tarifasid','=','1')
                                ->where('productos_imagenes.principal','=','1')
                                ->where('productos_tarifas.precio', '>=', $min_price)
                                ->where('productos_tarifas.precio', '<=', $max_price)
                                ->get();
        }elseif($min_price != null && $max_price != null){
            $products =         Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
                                ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                                ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                                ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                                ->where('productos_tarifas.tarifasid','=','1')
                                ->where('productos_imagenes.principal','=','1')
                                ->where('productos_tarifas.precio', '>=', $min_price)
                                ->where('productos_tarifas.precio', '<=', $max_price)
                                ->get();


        }

        if($query != null){
            $products = Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
                        ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                        ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                        ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                        ->where('productos_tarifas.tarifasid','=','1')
                        ->where('productos_imagenes.principal','=','1')
                        ->where('productos.descripcion', 'like', '%'.$query.'%')
                        ->get();
        }

        return view('frontend.product_listing', compact('products','query','productos_categoriasid','min_price', 'max_price','preciomaximo','preciominimo'));
    }
    public function variant_price(Request $request)
    {
    /*   
        $quantity = 0;
       
        $product_stock = Product::select('existenciastotales')->where('productosid',$request->productosid)->first();
     */
        $price = ProductTarifa::where('productosid',$request->id)->first();
        
        $precioT = round(($price->precio),2);
        return array('price' => (round(($precioT*$request->quantity),2)));
    }

    public function ajax_search(Request $request)
    {
        $keywords = array();
        $products = Product::get();
        

        $products = Product::select('productos.productosid','productos.descripcion','productos_tarifas.precio','productos_imagenes.imagen')
                    ->join('productos_tarifas','productos_tarifas.productosid','=','productos.productosid')
                    ->join('tarifas','tarifas.tarifasid','=','productos_tarifas.tarifasid')
                    ->join('productos_imagenes','productos_imagenes.productosid','=','productos.productosid')
                    ->where('productos_tarifas.tarifasid','=','1')
                    ->where('productos_imagenes.principal','=','1')
                    ->where('productos.descripcion', 'like', '%'.$request->search.'%')
                    ->get()
                    ->take(5);

        $categories = Category::where('descripcion', 'like', '%'.$request->search.'%')->get()->take(5);

        if(sizeof($categories)>0 || sizeof($products)>0){
            return view('frontend.partials.search_content', compact('products', 'categories'));
        }
        return 0;
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
    public function create(array $data)
    {
      return User::create([
        'cedula' => $data['cedula'],
        'phone' => $data['phone'],
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function registroPost(Request $request)
    {  
        $request->validate([
            'cedula' => 'required|string|unique:users|min:10|max:13',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string|min:7|max:10',
            'password' => 'required|string|min:6|max:15|confirmed',
            ]
        );

        $data = $request->all();
        $check = $this->create($data);

      
        flash('Registrado Correctamente')->success();
         return redirect("/");
        
       
       
    }
}
