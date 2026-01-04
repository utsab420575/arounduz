<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoostFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'boost_plan_id',
        'feature',
    ];

    public function boostPlan()
    {
        return $this->belongsTo(BoostPlan::class);
    }
}