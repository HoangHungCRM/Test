<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart_data;
use App\Models\Products;


class Cart_data_detail extends Model
{
    use HasFactory;
    protected $table = 'cart_detail';
    public function cart_data(){
        return $this->belongsTo(Cart_data::class,'id_cart','id');
    }
    public function product(){
        Return $this->belongsTo(Products::class,'id_product','id');
    }
}
