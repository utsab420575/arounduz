<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencySocialAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'social_type_id',
        'url',
        'order_no',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function socialType()
    {
        return $this->belongsTo(SocialType::class);
    }
}