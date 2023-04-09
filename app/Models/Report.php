<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = [
        'date',
        'total',
        'net_price',
        'percentage',
        'cost',
        'payment_status',
    ];
    public function store()
    {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }
}
