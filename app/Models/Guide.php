<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'region_id',
        'city_id',
        'title',
        'tagline',
        'location',
        'address',
        'rating',
        'reviews_count',
        'tours_completed',
        'experience_years',
        'hourly_rate',
        'daily_rate',
        'description',
        'license_number',
        'verified',
        'available',
        'status',
        'cover_image',
    ];

    protected $casts = [
        'verified' => 'boolean',
        'available' => 'boolean',
        'hourly_rate' => 'decimal:2',
        'daily_rate' => 'decimal:2',
        'rating' => 'decimal:2',
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
        return $this->belongsToMany(Language::class, 'guide_languages');
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'guide_specializations');
    }
}
