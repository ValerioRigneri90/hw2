<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Cart extends Model
{


 use HasFactory;


     use HasFactory;

    protected $fillable=[
        "userId",
        "productId",
        "quantity",
    ];
}
