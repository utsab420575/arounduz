<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_subscription_id')->constrained()->onDelete('cascade');
            $table->string('viewable_type');
            $table->unsignedBigInteger('viewable_id');
            $table->timestamp('viewed_at');
            $table->timestamps();
            
            $table->index(['viewable_type', 'viewable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_views');
    }
};