<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideSocialAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'guide_id',
        'social_type_id',
        'url',
        'order_no',
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function socialType()
    {
        return $this->belongsTo(SocialType::class);
    }
}