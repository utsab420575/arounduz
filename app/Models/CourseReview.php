<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_course_id',
        'course_enrollment_id',
        'rating',
        'review',
        'helpful_count',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingCourse()
    {
        return $this->belongsTo(TrainingCourse::class);
    }

    public function courseEnrollment()
    {
        return $this->belongsTo(CourseEnrollment::class);
    }
}