<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';


    protected  $fillable =['address1','address2','country','city','zip','state'];

    public function userAddress(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
