<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'available_type',
        'available_id',
        'date',
        'status',
        'slots_total',
        'slots_booked',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function available()
    {
        return $this->morphTo();
    }
}