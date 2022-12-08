<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavShops extends Model
{
    use HasFactory;

    protected $table='fav_shops';

    protected $fillable = [
        'store_id',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function store(){
        return $this->belongsTo('App\Models\Store','store_id');
    }
}
