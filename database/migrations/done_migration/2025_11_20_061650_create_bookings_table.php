<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bookable_type');
            $table->unsignedBigInteger('bookable_id');
            $table->date('tour_date');
            $table->time('start_time')->nullable();
            $table->string('duration')->nullable();
            $table->integer('num_people')->default(1);
            $table->string('service_type')->nullable();
            $table->text('special_requests')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'refunded'])->default('pending');
            $table->timestamps();
            
            $table->index(['bookable_type', 'bookable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};