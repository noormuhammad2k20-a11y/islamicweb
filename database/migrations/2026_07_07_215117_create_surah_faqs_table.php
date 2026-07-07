<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
            $table->text('question_en');
            $table->text('question_ur')->nullable();
            $table->text('answer_en');
            $table->text('answer_ur')->nullable();
            $table->string('intent_type')->nullable();
            // Values: navigational | informational | religious | educational | download
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->index(['surah_id', 'is_published', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_faqs');
    }
};
