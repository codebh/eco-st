<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table='cart_items';
    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
        'price',
    ];



    public function cart(){
        return $this->belongsTo('App\Models\Cart','cart_id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function cart_option()
    {
        return $this->hasMany('App\Models\CartOption', 'cartItem_id', 'id');
    }

}
