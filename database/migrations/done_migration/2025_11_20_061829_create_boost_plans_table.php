<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boost_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['vip', 'featured', 'sponsor', 'top_search']);
            $table->decimal('price', 10, 2);
            $table->string('currency')->default('USD');
            $table->integer('duration_days');
            $table->integer('position_priority')->default(0);
            $table->text('features')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boost_plans');
    }
};