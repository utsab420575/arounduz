<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBoost extends Model
{
    use HasFactory;

    protected $fillable = [
        'boostable_type',
        'boostable_id',
        'boost_plan_id',
        'starts_at',
        'expires_at',
        'status',
        'payment_id',
        'views_count',
        'clicks_count',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function boostable()
    {
        return $this->morphTo();
    }

    public function boostPlan()
    {
        return $this->belongsTo(BoostPlan::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}