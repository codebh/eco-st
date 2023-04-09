<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeAbaya extends Model
{
    use HasFactory;

    protected  $table = 'size_abayas';

    protected  $fillable =[
        'product_id',
        'img_abaya',
        'size_abaya',


    ];
}
