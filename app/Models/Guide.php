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
        'rating' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'daily_rate' => 'decimal:2',
        'verified' => 'boolean',
        'available' => 'boolean',
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
        return $this->hasMany(GuideLanguage::class);
    }

    public function specializations()
    {
        return $this->hasMany(GuideSpecialization::class);
    }

    public function certifications()
    {
        return $this->hasMany(GuideCertification::class);
    }

    public function socialAccounts()
    {
        return $this->hasMany(GuideSocialAccount::class);
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function galleryImages()
    {
        return $this->morphMany(GalleryImage::class, 'imageable');
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function availability()
    {
        return $this->morphMany(Availability::class, 'available');
    }

    public function profileBoosts()
    {
        return $this->morphMany(ProfileBoost::class, 'boostable');
    }

    public function contactViews()
    {
        return $this->morphMany(ContactView::class, 'viewable');
    }

    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::class, 'loggable');
    }
}