<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function guideSpecializations()
    {
        return $this->hasMany(GuideSpecialization::class);
    }

    public function agencySpecializations()
    {
        return $this->hasMany(AgencySpecialization::class);
    }
}