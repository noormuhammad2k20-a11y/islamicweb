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
        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->string('symbol_roman_urdu')->nullable()->after('symbol_arabic');
            $table->string('meta_title')->nullable()->after('seo_title');
            
            // Open Graph
            $table->string('og_title')->nullable()->after('canonical_url');
            $table->text('og_description')->nullable()->after('og_title');
            $table->string('og_image')->nullable()->after('og_description');
            
            // Twitter Cards
            $table->string('twitter_title')->nullable()->after('og_image');
            $table->text('twitter_description')->nullable()->after('twitter_title');
            $table->string('twitter_image')->nullable()->after('twitter_description');
            
            // Rich Content / Schema
            $table->json('scholarly_opinions')->nullable()->after('source_book'); // Array of objects [{scholar: "Ibn Sirin", interpretation: "...", source: "..."}]
            $table->json('quran_reference')->nullable()->after('scholarly_opinions');
            $table->json('hadith_reference')->nullable()->after('quran_reference');
            $table->json('faqs')->nullable()->after('hadith_reference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->dropColumn([
                'symbol_roman_urdu',
                'meta_title',
                'og_title', 'og_description', 'og_image',
                'twitter_title', 'twitter_description', 'twitter_image',
                'scholarly_opinions', 'quran_reference', 'hadith_reference', 'faqs'
            ]);
        });
    }
};
