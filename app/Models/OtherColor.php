<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherColor extends Model
{
    use HasFactory;
    protected  $table = 'other_colors';

    protected  $fillable =[
        'product_id',
        'color_key',
        'color_show',


    ];
    public function color(){
        return $this->belongsTo('App\Models\Color','color_key');
    }
}
