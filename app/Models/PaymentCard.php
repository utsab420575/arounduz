<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card_brand',
        'card_last_four',
        'card_token',
        'is_default',
        'expires_at',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}