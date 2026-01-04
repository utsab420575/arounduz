<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payable_type',
        'payable_id',
        'amount',
        'currency',
        'payment_method',
        'transaction_id',
        'payment_gateway',
        'status',
        'paid_at',
        'refunded_at',
        'refund_amount',
        'refund_reason',
        'metadata',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'refund_amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payable()
    {
        return $this->morphTo();
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function couponUsages()
    {
        return $this->hasMany(CouponUsage::class);
    }
}