<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable =[
        'user_id',
        'billing_email',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_province',
        'billing_postalcode',
        'billing_phone',
        'size1',
        'size2',
        'size3',
        'size4',
        'size5',
        'size6',
        'billing_discount',
        'billing_discount_code',
        'billing_subtotal',
        'billing_tax',
        'billing_delivery',
        'billing_total',
        'shipped'
    ];
    public function product_id()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    public function user_id()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function store_id()
    {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }
    public function products(){
        return $this->belongsToMany('App\Models\Product');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function items(){
        return $this->belongsToMany(OrderProduct::class);
    }


}
