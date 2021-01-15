<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'amount'
    ];

    public function address(){
        return $this->belongsTo('App\Models\Address');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function orderitem(){
        return $this->hasMany('App\Models\Orderitem');
    }

    public function discount(){
        return $this->belongsTo('App\Models\Discount');
    }


}
