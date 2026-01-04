<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'flag',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function guides()
    {
        return $this->hasMany(Guide::class);
    }

    public function agencies()
    {
        return $this->hasMany(Agency::class);
    }
}