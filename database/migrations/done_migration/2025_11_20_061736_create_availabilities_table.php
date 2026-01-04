<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('availability', function (Blueprint $table) {
            $table->id();
            $table->string('available_type');
            $table->unsignedBigInteger('available_id');
            $table->date('date');
            $table->enum('status', ['available', 'limited', 'booked', 'unavailable'])->default('available');
            $table->integer('slots_total')->default(0);
            $table->integer('slots_booked')->default(0);
            $table->timestamps();
            
            $table->index(['available_type', 'available_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('availability');
    }
};