<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surahs', function (Blueprint $table) {
            // Only add if not already indexed
            $table->index('slug');
            $table->index('number');
            $table->index('revelation_type');
            $table->index('juz_start');
        });

        Schema::table('ayahs', function (Blueprint $table) {
            $table->index(['surah_id', 'ayah_number']);
            $table->index('juz');
            $table->index('sajdah');
        });

        Schema::table('translations_english', function (Blueprint $table) {
            $table->index('ayah_id');
        });

        Schema::table('translations_urdu', function (Blueprint $table) {
            $table->index('ayah_id');
        });

        Schema::table('tafsirs', function (Blueprint $table) {
            $table->index(['ayah_id', 'language']);
        });
    }

    public function down(): void
    {
        Schema::table('surahs', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['number']);
            $table->dropIndex(['revelation_type']);
            $table->dropIndex(['juz_start']);
        });

        Schema::table('ayahs', function (Blueprint $table) {
            $table->dropIndex(['surah_id', 'ayah_number']);
            $table->dropIndex(['juz']);
            $table->dropIndex(['sajdah']);
        });

        Schema::table('translations_english', function (Blueprint $table) {
            $table->dropIndex(['ayah_id']);
        });

        Schema::table('translations_urdu', function (Blueprint $table) {
            $table->dropIndex(['ayah_id']);
        });

        Schema::table('tafsirs', function (Blueprint $table) {
            $table->dropIndex(['ayah_id', 'language']);
        });
    }
};
