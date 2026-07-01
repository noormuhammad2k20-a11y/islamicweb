<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // First drop old redundant tables if they exist
        Schema::dropIfExists('tafseer');
        Schema::dropIfExists('surah_ayahs');
        Schema::dropIfExists('tafsirs');
        Schema::dropIfExists('translations_urdu');
        Schema::dropIfExists('translations_english');
        Schema::dropIfExists('ayahs');

        // Let's modify the surahs table rather than drop it, to preserve its FKs to reviews etc.
        // Or we can just drop it and let the seeder re-seed it (Assuming there are no existing critical FKs that CASCADE).
        // Since it's a completely new architecture, let's just drop and recreate it, or modify.
        // It's safer to just modify.
        
        Schema::table('surahs', function (Blueprint $table) {
            // Drop old columns if they exist
            $columnsToDrop = ['name_ar', 'name_en', 'name_ur', 'slug', 'ayah_count', 'revelation_place', 'para_juz', 'start_page', 'end_page', 'ruku_count'];
            foreach ($columnsToDrop as $col) {
                if (Schema::hasColumn('surahs', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        Schema::table('surahs', function (Blueprint $table) {
            // Re-add them correctly
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ur')->nullable();
            $table->string('meaning_en')->nullable();
            $table->string('meaning_ur')->nullable();
            $table->string('revelation_type')->nullable(); // Makki / Madani
            $table->integer('revelation_order')->nullable();
            $table->integer('total_ayahs')->nullable();
            $table->integer('total_rukus')->nullable();
            $table->integer('juz_start')->nullable();
            $table->integer('juz_end')->nullable();
            $table->integer('page_start')->nullable();
            $table->integer('page_end')->nullable();
            $table->boolean('bismillah_pre')->default(true);
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
        });

        // 1. Ayahs table
        Schema::create('ayahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->cascadeOnDelete();
            $table->integer('ayah_number');
            $table->text('arabic_text');
            $table->integer('juz')->nullable();
            $table->integer('ruku')->nullable();
            $table->integer('hizb')->nullable();
            $table->integer('rub_ul_hizb')->nullable();
            $table->integer('manzil')->nullable();
            $table->integer('page_number')->nullable();
            $table->boolean('sajdah')->default(false);
            $table->string('sajdah_type')->nullable(); // 'recommended' or 'obligatory'
            $table->timestamps();
        });

        // 2. Translations (English)
        Schema::create('translations_english', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ayah_id')->constrained('ayahs')->cascadeOnDelete();
            $table->text('text');
            $table->string('translator_name')->nullable();
            $table->timestamps();
        });

        // 3. Translations (Urdu)
        Schema::create('translations_urdu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ayah_id')->constrained('ayahs')->cascadeOnDelete();
            $table->text('text');
            $table->string('translator_name')->nullable();
            $table->timestamps();
        });

        // 4. Tafsirs
        Schema::create('tafsirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ayah_id')->constrained('ayahs')->cascadeOnDelete();
            $table->string('language'); // 'english', 'urdu'
            $table->string('scholar_name')->nullable();
            $table->longText('text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tafsirs');
        Schema::dropIfExists('translations_urdu');
        Schema::dropIfExists('translations_english');
        Schema::dropIfExists('ayahs');
        
        // Rolling back surah changes would be complex, dropping it completely for down is standard for such large refactors.
        Schema::dropIfExists('surahs'); 
    }
};
