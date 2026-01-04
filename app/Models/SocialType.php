<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'base_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function guideSocialAccounts()
    {
        return $this->hasMany(GuideSocialAccount::class);
    }

    public function agencySocialAccounts()
    {
        return $this->hasMany(AgencySocialAccount::class);
    }
}