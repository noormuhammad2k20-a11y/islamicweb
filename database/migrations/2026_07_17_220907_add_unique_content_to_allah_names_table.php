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
        Schema::table('allah_names', function (Blueprint $table) {
            $table->text('quran_verse_arabic')->nullable()->after('quran_reference');
            $table->text('quran_verse_translation')->nullable()->after('quran_verse_arabic');
            $table->text('explanation')->nullable()->after('quran_verse_translation');
            $table->text('virtues')->nullable()->after('explanation');
            $table->text('practical_lessons')->nullable()->after('virtues');
            $table->text('dhikr_reflection')->nullable()->after('practical_lessons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('allah_names', function (Blueprint $table) {
            $table->dropColumn([
                'quran_verse_arabic',
                'quran_verse_translation',
                'explanation',
                'virtues',
                'practical_lessons',
                'dhikr_reflection'
            ]);
        });
    }
};
