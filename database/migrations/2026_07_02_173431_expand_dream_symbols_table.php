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
            $table->string('symbol_arabic')->nullable()->after('symbol_urdu');
            $table->text('short_interpretation')->nullable()->after('symbol_english');
            
            // Rename interpretation_urdu to detailed_interpretation (we'll keep interpretation_urdu for fallback/legacy and add detailed_interpretation_urdu/english)
            // But let's just add new columns to avoid dropping existing data directly
            $table->text('detailed_interpretation_urdu')->nullable()->after('interpretation_english');
            $table->text('detailed_interpretation_english')->nullable()->after('detailed_interpretation_urdu');
            
            $table->string('source_book')->nullable()->after('scholar_reference');
            
            $table->json('keywords')->nullable()->after('slug');
            $table->text('search_keywords')->nullable()->after('keywords'); // Roman Urdu, synonyms
            
            $table->string('seo_title')->nullable()->after('search_keywords');
            $table->text('meta_description')->nullable()->after('seo_title');
            $table->string('canonical_url')->nullable()->after('meta_description');
            
            $table->boolean('published_status')->default(1)->after('canonical_url');
            
            // dream_type Enum
            // 0: Neutral, 1: Good, 2: Bad, 3: Warning
            $table->tinyInteger('dream_type')->nullable()->after('is_good_dream');
        });
        
        // Migrate existing is_good_dream data to dream_type
        \DB::statement('UPDATE dream_symbols SET dream_type = is_good_dream WHERE is_good_dream IS NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->dropColumn([
                'symbol_arabic',
                'short_interpretation',
                'detailed_interpretation_urdu',
                'detailed_interpretation_english',
                'source_book',
                'keywords',
                'search_keywords',
                'seo_title',
                'meta_description',
                'canonical_url',
                'published_status',
                'dream_type'
            ]);
        });
    }
};
