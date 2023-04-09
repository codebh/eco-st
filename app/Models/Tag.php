<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Cviebrock\EloquentSluggable\Sluggable;


//use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory;
    use HasSlug;
    use sluggable;

//    use Searchable;


    protected $table = 'tags';

    protected $fillable = [
        'name_ar',
        'name_en',
        'collection',
        'c_show',
        'ended_at',
        'started_at',
        'des_ar',
        'des_en',
        'slug',

    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_en',
            ],
        ];
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_en')
            ->saveSlugsTo('slug');
    }



}
