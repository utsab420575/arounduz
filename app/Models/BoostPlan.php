<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoostPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'price',
        'currency',
        'duration_days',
        'position_priority',
        'features',
        'is_active',
        'order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function profileBoosts()
    {
        return $this->hasMany(ProfileBoost::class);
    }

    public function features()
    {
        return $this->hasMany(BoostFeature::class);
    }
}