<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Cviebrock\EloquentSluggable\Sluggable;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class Store extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use sluggable;
    use HasSlug;
    use HasProfilePhoto;
    use HasTeams;
    use TwoFactorAuthenticatable;
    use HasApiTokens;
    //  use SoftDeletes;


    protected $table ='stores';
    protected $fillable = [

        'f_name',
        'name',
        'l_name',
        'code',
        'mobile',
        'email',
        'password',
        'percentage',
        'i_account',
        'address',
        'cr',
        'cpr',
        'logo',
        'iban',
        'bio',
        'new',
        'close',
        'date_of_end',
        'reason',

    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
