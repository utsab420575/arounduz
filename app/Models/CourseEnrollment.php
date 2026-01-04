<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_course_id',
        'payment_id',
        'enrolled_at',
        'started_at',
        'completed_at',
        'progress_percentage',
        'status',
        'certificate_issued',
        'certificate_number',
        'certificate_issued_at',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'certificate_issued' => 'boolean',
        'certificate_issued_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingCourse()
    {
        return $this->belongsTo(TrainingCourse::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function lessonProgress()
    {
        return $this->hasMany(LessonProgress::class);
    }

    public function certificate()
    {
        return $this->hasOne(CourseCertificate::class);
    }
}