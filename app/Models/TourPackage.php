<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'title',
        'description',
        'duration',
        'price',
        'group_size',
        'difficulty_level',
        'includes',
        'excludes',
        'itinerary',
        'from_date',
        'to_date',
        'availability_dates',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}