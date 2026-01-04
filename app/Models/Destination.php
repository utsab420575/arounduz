<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'description',
        'image',
        'guides_count',
        'tours_count',
        'featured',
        'order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function highlights()
    {
        return $this->hasMany(DestinationHighlight::class);
    }
}