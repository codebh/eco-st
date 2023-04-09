<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

use Cviebrock\EloquentSluggable\Sluggable;



class Product extends Model
{
    use HasFactory ;
    use Searchable;
    use SoftDeletes;
    use HasSlug;
    use Sluggable;


    const PRICES = [
        'Less than 20',
        'From 20 to 40',
        'From 40 to 60',
        'More than 60',
    ];
    protected $table = 'products';
    protected $fillable = [
        'title',
        'content',
        'store_id',
        'category_id',
        'price',
        'price_offer',
        'status',
        'show'
    ];
    public function sluggable(): array
    {
        return [
            'title' => [
                'source' => 'title'
            ]
        ];
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('store.code')
            ->saveSlugsTo('title')
            ->usingSeparator('');
    }


    public function abaya_data()
    {
        return $this->hasMany('App\Models\SizeAbaya', 'product_id', 'id');
    }

    public function other_data()
    {
        return $this->hasMany('App\Models\OtherData', 'product_id', 'id');
    }
    public function tag_data()
    {
        return $this->hasMany('App\Models\TagData', 'product_id', 'id');
    }


    public function size_data()
    {
        return $this->hasMany('App\Models\SizeData', 'product_id', 'id');
    }

    public function other_color()
    {
        return $this->hasMany('App\Models\OtherColor', 'product_id', 'id');
    }


    public function image_data()
    {
        return $this->hasMany('App\Models\ImageData', 'product_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function presentPrice()
    {
        return money_format('$%i', $this->price / 100);
    }

    public function files()
    {
        return $this->hasMany('App\File', 'product_id', 'id');
    }

    public function store()
    {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function color()
    {
        return $this->hasOne('App\Models\Color', 'id', 'color_id');
    }



//    public function categories()
//    {
//        return $this->belongsToMany('App\Models\Category');
//    }
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $extraFields = [
//            'catgory_id' => $this->category->pluck('name_en')->toArray(),
//        'colors'=> $this->other_data()->pluck('data_key')->toArray(),
        // 'colors'=> $this->other_data()->pluck('data_key')->toArray(),
        //    'tag_data'=> $this->tag_data()->pluck('tag_id'),

//        'colors'=> $this->other_data->data_key->toArray(),
//        'colors'=> $this->other_data()->data_key->toArray(),
//        'category_id' => $this->category->pluck('name_en','id'),

        // 'category_id' => $this->category->name_en,
        'category_id' =>$this->category->name_en,
        'store_id' => $this->store->name,
        'color_id' => $this->color->name_en,

        ];

        return array_merge($array, $extraFields);
    }


    public function scopeWithFilters($query, $prices, $categories, $stores)
    {
         return $query->when(count($categories), function ($query) use ($categories) {
            $query->whereIn('category_id', $categories);
        })
            ->when(count($stores), function ($query) use ($stores) {
                $query->whereIn('store_id', $stores);
            })


            ->when(count($prices), function ($query) use ($prices){
                $query->where(function ($query) use ($prices) {
                    $query->when(in_array(0, $prices), function ($query) {
                        $query->orWhere('price', '<', '20');
                    })
                        ->when(in_array(1, $prices), function ($query) {
                            $query->orWhereBetween('price', ['20', '40']);
                        })
                        ->when(in_array(2, $prices), function ($query) {
                            $query->orWhereBetween('price', ['40', '60']);
                        })
                        ->when(in_array(3, $prices), function ($query) {
                            $query->orWhere('price', '>', '60');
                        });
                });
            });
    }
    public function scopeWithFiltersColor($query, $prices, $colors, $stores)
    {
         return $query->when(count($colors), function ($query) use ($colors) {
            $query->whereIn('color_id', $colors);
        })
            ->when(count($stores), function ($query) use ($stores) {
                $query->whereIn('store_id', $stores);
            })


            ->when(count($prices), function ($query) use ($prices){
                $query->where(function ($query) use ($prices) {
                    $query->when(in_array(0, $prices), function ($query) {
                        $query->orWhere('price', '<', '20');
                    })
                        ->when(in_array(1, $prices), function ($query) {
                            $query->orWhereBetween('price', ['20', '40']);
                        })
                        ->when(in_array(2, $prices), function ($query) {
                            $query->orWhereBetween('price', ['40', '60']);
                        })
                        ->when(in_array(3, $prices), function ($query) {
                            $query->orWhere('price', '>', '60');
                        });
                });
            });
    }








}
