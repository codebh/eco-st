<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class Color extends Model
{
//    use Searchable;

    use HasFactory;
    protected $table='colors';
    protected $fillable =[
        'name_ar',
        'name_en',
        'color',

    ];
    public function products() {
        return $this->hasMany(Product::class);
    }
}
