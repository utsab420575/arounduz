<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bookable_type',
        'bookable_id',
        'tour_date',
        'start_time',
        'duration',
        'num_people',
        'service_type',
        'special_requests',
        'total_price',
        'status',
        'payment_status',
    ];

    protected $casts = [
        'tour_date' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookable()
    {
        return $this->morphTo();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}