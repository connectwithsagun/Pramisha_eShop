<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_desc',
        'price',
        'image',
        'category_id',
        'sub_category_id',
        'discount',
        'old_price',
        'image'
    ];
    // protected $attributes = [
    //     'image' => ' ',
    // ];

    protected $with = ['category','sub_category'];



    public function category(){ //category_id
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function sub_category(){ //category_id
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(SubCategory::class);
    }

    // public function scopeSearch($query, array $terms){ 
    //     $search = $terms['search'];
    //     $category = $terms['category'];
    //     $query->when($search, function($query, $search){
    //         return $query->where('product_name', 'like', '%'. $search .'%')
    //             ->orWhere('product_desc', 'like', '%'. $search .'%');
    //     }
    //     // , function($query){
    //     //     return $query->where('id', '>', 0);
    //     // }
    //     );

    //     $query->when($category, function($query, $category){
    //         return $query->whereCategoryId($category);
    //     });

    //     // if( $search ) {
    //     //     $query->where('product_name', 'like', '%'. $search .'%')
    //     //         ->orWhere('product_desc', 'like', '%'. $search .'%');
    //     // }
    //     return $query;
    // }
}
