<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart_data_detail;

class Cart_data extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public function cart_data_detail(){
        return $this->hasMany(Cart_data_detail::class,'id_cart','id');
    }
}
