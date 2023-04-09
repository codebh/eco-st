<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeData extends Model
{
    use HasFactory;
    protected  $table = 'size_data';

    protected  $fillable =[
        'product_id',
        'size_data',
        'size_qty',


    ];
    public function size(){
        return $this->belongsTo('App\Models\Size','size_data');
    }
}
