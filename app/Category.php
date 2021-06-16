<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = "productos_categorias";

    protected $fillable = [
        'descripcion'
    ];
}
