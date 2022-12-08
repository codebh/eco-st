<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'order_product';

    protected  $fillable =['product_id','order_id','store_id','price','confirm'];

// upload other data mode and image data model
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function orderUser(){
        return $this->belongsTo('App\User','user_id');
    }
    public function store(){
        return $this->belongsTo('App\Models\Store','store_id');
    }
    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }
}
