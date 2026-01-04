<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_enrollment_id',
        'course_lesson_id',
        'status',
        'completed_at',
        'time_spent_minutes',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function courseEnrollment()
    {
        return $this->belongsTo(CourseEnrollment::class);
    }

    public function courseLesson()
    {
        return $this->belongsTo(CourseLesson::class);
    }
}