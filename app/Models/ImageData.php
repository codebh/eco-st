<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageData extends Model
{
    use HasFactory;
    protected  $table = 'image_data';
    protected  $fillable =[
        'product_id',
        'image_key',
        //'data_value'

    ];
}
