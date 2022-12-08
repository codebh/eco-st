<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOption extends Model
{
    use HasFactory;

    protected $table='cart_options';
    protected $fillable = [
        'cartItem_id',
        'key',
        'value',
    ];



    // public function cartItems(){
    //     return $this->belongsTo('App\Models\CartItem','cartItem_id');
    // }
}
