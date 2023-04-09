<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagData extends Model
{
    use HasFactory;

    protected  $table = 'tag_data';

    protected  $fillable =[
        'product_id',
        'tag_id',



    ];
    public function tag(){
        return $this->belongsTo('App\Models\Tag','tag_id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
