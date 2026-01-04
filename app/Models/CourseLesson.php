<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_module_id',
        'title',
        'description',
        'content',
        'video_url',
        'attachments',
        'order',
        'duration_minutes',
        'is_free',
    ];

    protected $casts = [
        'is_free' => 'boolean',
    ];

    public function courseModule()
    {
        return $this->belongsTo(CourseModule::class);
    }

    public function lessonProgress()
    {
        return $this->hasMany(LessonProgress::class);
    }
}
