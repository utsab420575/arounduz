<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'level',
        'duration_hours',
        'price',
        'currency',
        'instructor_name',
        'instructor_bio',
        'image',
        'video_url',
        'is_active',
        'is_certified',
        'certificate_name',
        'views_count',
        'enrollments_count',
        'rating',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'decimal:2',
        'is_active' => 'boolean',
        'is_certified' => 'boolean',
    ];

    public function modules()
    {
        return $this->hasMany(CourseModule::class);
    }

    public function enrollments()
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    public function certificates()
    {
        return $this->hasMany(CourseCertificate::class);
    }

    public function reviews()
    {
        return $this->hasMany(CourseReview::class);
    }
}