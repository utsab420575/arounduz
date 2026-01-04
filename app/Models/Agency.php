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
        return $this->hasMany(AgencyLanguage::class);
    }

    public function specializations()
    {
        return $this->hasMany(AgencySpecialization::class);
    }

    public function socialAccounts()
    {
        return $this->hasMany(AgencySocialAccount::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(AgencyTeamMember::class);
    }

    public function tourPackages()
    {
        return $this->hasMany(TourPackage::class);
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