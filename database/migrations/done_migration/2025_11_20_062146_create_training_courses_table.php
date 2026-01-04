<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('category', ['guide_certification', 'first_aid', 'language', 'hospitality', 'safety', 'marketing']);
            $table->enum('level', ['beginner', 'intermediate', 'advanced']);
            $table->integer('duration_hours')->default(0);
            $table->decimal('price', 10, 2);
            $table->string('currency')->default('USD');
            $table->string('instructor_name')->nullable();
            $table->text('instructor_bio')->nullable();
            $table->string('image')->nullable();
            $table->string('video_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_certified')->default(false);
            $table->string('certificate_name')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('enrollments_count')->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_courses');
    }
};