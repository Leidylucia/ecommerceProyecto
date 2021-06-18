<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* PRODUCTOS INDEX */
Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/home/section/featured', [HomeController::class,'load_featured_section'])->name('home.section.featured');
Route::post('/home/section/best_selling', [HomeController::class,'load_best_selling_section'])->name('home.section.best_selling');



/* Categorias */
Route::get('/categories', [HomeController::class,'all_categories'])->name('categories.all');




/* LOGIN */
Route::get('/users/login', [HomeController::class,'login'])->name('user.login');
Route::get('/users/registration', [HomeController::class,'registration'])->name('user.registration');


/* WISHLISTS */

Route::resource('wishlist', WishlistController::class);

/* AÑADIR AL CARRITO */
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::post('/cart/show-cart-modal', [CartController::class,'showCartModal'])->name('cart.showCartModal');

/* CATEGORIA PRODUCTOS */
Route::get('/customer-products?category={category_slug}', [CustomerProductController::class,'search'])->name('customer_products.category');
Route::get('/category/{productos_categoriasid}', [HomeController::class,'listingByCategory'])->name('products.category');


/* Route::get('/category/{category_slug}', [HomeController::class,'listingByCategory'])->name('products.category'); */


/* PRODUCTOS */
Route::get('/product/{productosid}',[HomeController::class,'product'])->name('product');


/* TERMINOS Y CONDICIONES */
Route::get('/terms', [HomeController::class,'terms'])->name('terms');
Route::get('/privacypolicy', [HomeController::class,'privacypolicy'])->name('privacypolicy');
Route::get('/returnpolicy',  [HomeController::class,'returnpolicy'])->name('returnpolicy');
Route::get('/supportpolicy',  [HomeController::class,'supportpolicy'])->name('supportpolicy');
/* Route::get('/listado',[ProductController::class,'listar']); */


Route::get('/search', [HomeController::class,'search'])->name('search');
Route::post('/product/variant_price',  [HomeController::class,'variant_price'])->name('products.variant_price');


/*SEARCH*/
Route::post('/ajax-search', [HomeController::class,'ajax_search'])->name('search.ajax');


/* AÑADIR AL CARRITO */
Route::post('/cart/addtocart', [HomeController::class,'addToCart'])->name('cart.addToCart');


/* LOGIN */

Route::get('/users/login', [HomeController::class,'login'])->name('user.login');
