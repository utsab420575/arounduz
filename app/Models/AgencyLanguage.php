<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'language_id',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}