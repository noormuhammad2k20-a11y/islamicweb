<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_learning_paths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade')->unique();
            $table->enum('difficulty_level', ['beginner', 'intermediate', 'advanced'])
                  ->default('beginner');
            $table->integer('estimated_reading_minutes')->nullable();
            $table->integer('word_count')->nullable();
            $table->integer('unique_roots')->nullable();
            $table->integer('reading_difficulty_score')->nullable(); // 1-100
            $table->text('memorization_tips_en')->nullable();
            $table->text('memorization_tips_ur')->nullable();
            $table->text('listening_guide_en')->nullable();
            $table->text('study_notes_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_learning_paths');
    }
};
