<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
     
        'quantity'
       
    ];

    public function Product(){ 
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Product::class);
    }
}
