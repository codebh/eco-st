<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table='carts';
    protected $fillable = [

        'id_cart',
        'key',
        'subTotal',
        'total',
        'tax',
        'code',
        'discount',
        'user_id',
    ];



    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }




}
