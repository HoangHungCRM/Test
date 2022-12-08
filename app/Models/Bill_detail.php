<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Bill_detail extends Model
{
    use HasFactory;
    protected $table = "bill_detail";
    public function product(){
        return $this->belongsTo(Products::class,'id_product','id');
    }
}
