<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('login_history', function (Blueprint $table) {
            $table->id();

            // Who logged in / tried to log in
            $table->foreignId('user_id')
                ->constrained('users')   // references id on users
                ->onDelete('cascade');

            // Request info
            $table->string('ip_address', 45)->nullable(); // IPv4/IPv6
            $table->text('user_agent')->nullable();

            // Parsed device info (optional, can be filled by code)
            $table->string('device')->nullable();
            $table->string('browser')->nullable();
            $table->string('os')->nullable();

            // Geolocation, e.g. "Tashkent, Uzbekistan"
            $table->string('location')->nullable();

            // Status
            $table->boolean('success')->default(true);
            $table->string('failure_reason')->nullable(); // e.g. "invalid_password"

            // When it happened
            $table->timestamp('logged_in_at')->useCurrent();

            // Standard created_at / updated_at
            $table->timestamps();

            // Helpful indexes
            $table->index(['user_id', 'success']);
            $table->index(['ip_address']);
            $table->index(['logged_in_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_history');
    }
};
