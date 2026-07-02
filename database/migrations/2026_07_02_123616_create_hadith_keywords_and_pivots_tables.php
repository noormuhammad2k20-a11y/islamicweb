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
        Schema::create('hadith_keywords', function (Blueprint $table) {
            $table->id();
            $table->string('keyword');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('ayah_hadith', function (Blueprint $table) {
            $table->foreignId('ayah_id')->constrained('ayahs')->cascadeOnDelete();
            $table->foreignId('hadith_id')->constrained('hadiths')->cascadeOnDelete();
            $table->primary(['ayah_id', 'hadith_id']);
        });

        Schema::create('hadith_surah', function (Blueprint $table) {
            $table->foreignId('hadith_id')->constrained('hadiths')->cascadeOnDelete();
            $table->foreignId('surah_id')->constrained('surahs')->cascadeOnDelete();
            $table->primary(['hadith_id', 'surah_id']);
        });

        Schema::create('related_hadiths', function (Blueprint $table) {
            $table->foreignId('hadith_id')->constrained('hadiths')->cascadeOnDelete();
            $table->foreignId('related_hadith_id')->constrained('hadiths')->cascadeOnDelete();
            $table->primary(['hadith_id', 'related_hadith_id']);
        });

        Schema::create('hadith_hadith_keyword', function (Blueprint $table) {
            $table->foreignId('hadith_id')->constrained('hadiths')->cascadeOnDelete();
            $table->foreignId('hadith_keyword_id')->constrained('hadith_keywords')->cascadeOnDelete();
            $table->primary(['hadith_id', 'hadith_keyword_id'], 'hadith_keyword_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadith_hadith_keyword');
        Schema::dropIfExists('related_hadiths');
        Schema::dropIfExists('hadith_surah');
        Schema::dropIfExists('ayah_hadith');
        Schema::dropIfExists('hadith_keywords');
    }
};
