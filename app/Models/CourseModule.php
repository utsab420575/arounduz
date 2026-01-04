<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_course_id',
        'title',
        'description',
        'order',
        'duration_minutes',
    ];

    public function trainingCourse()
    {
        return $this->belongsTo(TrainingCourse::class);
    }

    public function lessons()
    {
        return $this->hasMany(CourseLesson::class);
    }
}