<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideCertification extends Model
{
    use HasFactory;

    protected $fillable = [
        'guide_id',
        'certification_name',
        'certification_date',
        'expiry_date',
        'file',
        'status',
    ];

    protected $casts = [
        'certification_date' => 'date',
        'expiry_date' => 'date',
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}