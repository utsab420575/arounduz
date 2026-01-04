<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('reviewable_type');
            $table->unsignedBigInteger('reviewable_id');
            $table->foreignId('booking_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('rating');
            $table->string('title')->nullable();
            $table->text('review')->nullable();
            $table->string('tour_type')->nullable();
            $table->integer('helpful_count')->default(0);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
            
            $table->index(['reviewable_type', 'reviewable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};