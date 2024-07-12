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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique();
            $table->string('slug', 50);
            $table->string('card_image')->nullable();
            $table->string('show_image')->nullable();
            $table->string('preview_link', 100)->nullable();
            $table->string('github_link', 100)->nullable();
            $table->string('frontend_link', 100)->nullable();
            $table->string('backend_link', 100)->nullable();
            $table->string('yt_link', 100)->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
