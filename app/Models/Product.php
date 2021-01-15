<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'photos_url' => 'array'
    ];
    public function orderitem(){
        return $this->hasMany('App\Models\Orderitem');
    }
    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }
    public function wishlist(){
        return $this->belongsToMany('App\Models\Wishlist');
    }
}
