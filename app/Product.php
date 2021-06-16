<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = "productos";

    protected $fillable = [
        'descripcion',
        'productocodigo'
    ];

 
}
