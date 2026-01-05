<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'region_id',
        'city_id',
        'name',
        'tagline',
        'type',
        'established',
        'location',
        'address',
        'rating',
        'reviews_count',
        'tours_completed',
        'phone',
        'email',
        'website',
        'description',
        'license_number',
        'verified',
        'status',
        'logo',
        'cover_image',
    ];

    protected $casts = [
        'rating' => 'decimal:2',
        'verified' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'agency_languages');
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'agency_specializations');
    }
}
