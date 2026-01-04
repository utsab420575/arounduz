<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'badge_icon',
        'type',
        'requirement_value',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function userAchievements()
    {
        return $this->hasMany(UserAchievement::class);
    }
}