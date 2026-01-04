<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('action', ['profile_view', 'contact_view', 'booking_created', 'subscription_purchased', 'course_enrolled']);
            $table->string('loggable_type')->nullable();
            $table->unsignedBigInteger('loggable_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('metadata')->nullable();
            $table->timestamps();
            
            $table->index(['loggable_type', 'loggable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};