<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'guide_id',
        'language_id',
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}