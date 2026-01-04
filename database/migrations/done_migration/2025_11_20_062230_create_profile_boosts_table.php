<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_boosts', function (Blueprint $table) {
            $table->id();
            $table->string('boostable_type');
            $table->unsignedBigInteger('boostable_id');

            $table->foreignId('boost_plan_id')->constrained('boost_plans')->cascadeOnDelete();

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->enum('status', ['active', 'expired', 'cancelled'])->default('active');

            $table->foreignId('payment_id')->nullable()->constrained('payments')->nullOnDelete();

            $table->integer('views_count')->default(0);
            $table->integer('clicks_count')->default(0);
            $table->timestamps();

            $table->index(['boostable_type', 'boostable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_boosts');
    }
};
