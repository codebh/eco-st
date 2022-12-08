<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherData extends Model
{
    use HasFactory;
    protected  $table = 'other_data';

    protected  $fillable =[
        'product_id',
        'data_key',
        'data_value',


    ];
    public function color(){
        return $this->belongsTo('App\Models\Color','data_key');
    }
}
