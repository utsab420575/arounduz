<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_enrollment_id',
        'user_id',
        'training_course_id',
        'certificate_number',
        'certificate_name',
        'issued_at',
        'expires_at',
        'certificate_file',
        'verification_code',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function courseEnrollment()
    {
        return $this->belongsTo(CourseEnrollment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingCourse()
    {
        return $this->belongsTo(TrainingCourse::class);
    }
}