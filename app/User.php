<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password','cedula','phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function customer()
    {
    return $this->hasOne(Customer::class);
    }

}
