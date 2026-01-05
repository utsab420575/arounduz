<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationships
    public function guide()
    {
        return $this->hasOne(Guide::class);
    }

    public function agency()
    {
        return $this->hasOne(Agency::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    // Helper methods using Spatie
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isTourist()
    {
        return $this->hasRole('tourist');
    }

    public function isGuide()
    {
        return $this->hasRole('guide');
    }

    public function isAgency()
    {
        return $this->hasRole('agency');
    }

    public function hasCompletedProfile()
    {
        if ($this->hasRole('tourist')) {
            return $this->phone !== null;
        }

        if ($this->hasRole('guide')) {
            return $this->phone !== null && $this->guide !== null;
        }

        if ($this->hasRole('agency')) {
            return $this->phone !== null && $this->agency !== null;
        }

        return false;
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isSuspended()
    {
        return $this->status === 'suspended';
    }

    public function getRoleName()
    {
        return $this->roles->first()?->name ?? 'tourist';
    }
}
