<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Bill extends Model
{
    use HasFactory;
    protected $table ="bills";
    public function user(){
        return $this->belongsTo(User::class,'id_users','id');
    }

}
