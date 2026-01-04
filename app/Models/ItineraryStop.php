<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryStop extends Model
{
    use HasFactory;

    protected $fillable = [
        'itinerary_id',
        'stop_name',
        'duration',
        'order',
    ];

    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class);
    }
}