<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacture;
use App\Models\Products_image;
use App\Models\Cart_data_detail;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";

    public function manufacture(){
        return $this->belongsTo(Manufacture::class,'id_manufacture','id');
    }

    public function products_image(){
        return $this->hasMany(Products_image::class,'id_product','id');
    }

    public function cart_data_detail(){
        return $this->hasMany(Cart_data_detail::class, 'id_product', 'id');
    }

}
