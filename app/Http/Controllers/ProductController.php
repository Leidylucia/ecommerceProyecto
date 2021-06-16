<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tarifa;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  listar(){
        $listado = Product::get();
        
        return $listado;
    }

    public function mostrar(){
        $productos = Product::first();
        foreach ($productos->tarifas as  $product) {
            return $product;
       }
    }
}
