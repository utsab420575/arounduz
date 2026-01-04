<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'guide_id',
        'title',
        'duration',
        'price',
        'group_size',
        'recommended_for',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function stops()
    {
        return $this->hasMany(ItineraryStop::class);
    }

    public function includes()
    {
        return $this->hasMany(ItineraryInclude::class);
    }
}