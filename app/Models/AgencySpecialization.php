<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencySpecialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'specialization_id',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}