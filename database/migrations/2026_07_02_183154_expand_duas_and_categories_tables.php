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
        Schema::table('dua_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('dua_categories', 'parent_id')) {
                $table->foreignId('parent_id')->nullable()->constrained('dua_categories')->onDelete('cascade');
            }
            if (!Schema::hasColumn('dua_categories', 'name_roman_urdu')) {
                $table->string('name_roman_urdu')->nullable();
            }
            if (!Schema::hasColumn('dua_categories', 'slug_urdu')) {
                $table->string('slug_urdu')->nullable();
            }
            if (!Schema::hasColumn('dua_categories', 'seo_title')) {
                $table->string('seo_title')->nullable();
            }
            if (!Schema::hasColumn('dua_categories', 'seo_description')) {
                $table->text('seo_description')->nullable();
            }
        });

        Schema::table('duas', function (Blueprint $table) {
            if (!Schema::hasColumn('duas', 'title_roman_urdu')) {
                $table->string('title_roman_urdu')->nullable();
            }
            if (!Schema::hasColumn('duas', 'subcategory_id')) {
                $table->foreignId('subcategory_id')->nullable()->constrained('dua_categories')->onDelete('set null');
            }
            
            if (!Schema::hasColumn('duas', 'word_by_word_translation')) {
                $table->json('word_by_word_translation')->nullable();
            }
            if (!Schema::hasColumn('duas', 'short_meaning')) {
                $table->text('short_meaning')->nullable();
            }
            if (!Schema::hasColumn('duas', 'detailed_explanation')) {
                $table->longText('detailed_explanation')->nullable();
            }
            
            if (!Schema::hasColumn('duas', 'virtues')) {
                $table->text('virtues')->nullable();
            }
            
            if (!Schema::hasColumn('duas', 'authenticity')) {
                $table->string('authenticity')->nullable();
            }
            if (!Schema::hasColumn('duas', 'hadith_reference')) {
                $table->string('hadith_reference')->nullable();
            }
            if (!Schema::hasColumn('duas', 'hadith_number')) {
                $table->string('hadith_number')->nullable();
            }
            if (!Schema::hasColumn('duas', 'hadith_grade')) {
                $table->string('hadith_grade')->nullable();
            }
            if (!Schema::hasColumn('duas', 'narrator')) {
                $table->string('narrator')->nullable();
            }
            if (!Schema::hasColumn('duas', 'book_name')) {
                $table->string('book_name')->nullable();
            }
            if (!Schema::hasColumn('duas', 'chapter')) {
                $table->string('chapter')->nullable();
            }
            
            if (!Schema::hasColumn('duas', 'quran_reference')) {
                $table->string('quran_reference')->nullable();
            }
            if (!Schema::hasColumn('duas', 'surah')) {
                $table->string('surah')->nullable();
            }
            if (!Schema::hasColumn('duas', 'ayah')) {
                $table->string('ayah')->nullable();
            }
            
            if (!Schema::hasColumn('duas', 'keywords')) {
                $table->json('keywords')->nullable();
            }
            if (!Schema::hasColumn('duas', 'search_keywords')) {
                $table->json('search_keywords')->nullable();
            }
            if (!Schema::hasColumn('duas', 'alternative_names')) {
                $table->json('alternative_names')->nullable();
            }
            if (!Schema::hasColumn('duas', 'synonyms')) {
                $table->json('synonyms')->nullable();
            }
            if (!Schema::hasColumn('duas', 'tags')) {
                $table->json('tags')->nullable();
            }
            
            if (!Schema::hasColumn('duas', 'difficulty_level')) {
                $table->string('difficulty_level')->nullable();
            }
            if (!Schema::hasColumn('duas', 'reading_time')) {
                $table->integer('reading_time')->nullable(); // in seconds
            }
            
            if (!Schema::hasColumn('duas', 'audio_url')) {
                $table->string('audio_url')->nullable();
            }
            if (!Schema::hasColumn('duas', 'featured_image')) {
                $table->string('featured_image')->nullable();
            }
            
            if (!Schema::hasColumn('duas', 'verified_status')) {
                $table->boolean('verified_status')->default(true);
            }
            if (!Schema::hasColumn('duas', 'published_status')) {
                $table->boolean('published_status')->default(true);
            }
            
            if (!Schema::hasColumn('duas', 'seo_title')) {
                $table->string('seo_title')->nullable();
            }
            if (!Schema::hasColumn('duas', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('duas', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('duas', 'canonical_url')) {
                $table->string('canonical_url')->nullable();
            }
            if (!Schema::hasColumn('duas', 'open_graph')) {
                $table->string('open_graph')->nullable();
            }
            if (!Schema::hasColumn('duas', 'twitter_card')) {
                $table->string('twitter_card')->nullable();
            }
        });
        
        // Pivot table for related duas
        Schema::create('dua_related_dua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dua_id')->constrained('duas')->onDelete('cascade');
            $table->foreignId('related_dua_id')->constrained('duas')->onDelete('cascade');
            $table->timestamps();
        });
        
        // Pivot table for related articles
        Schema::create('dua_knowledge_article', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dua_id')->constrained('duas')->onDelete('cascade');
            $table->foreignId('article_id')->constrained('knowledge_articles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dua_knowledge_article');
        Schema::dropIfExists('dua_related_dua');

        Schema::table('duas', function (Blueprint $table) {
            $table->dropForeign(['subcategory_id']);
            
            $table->dropColumn([
                'title_roman_urdu', 'subcategory_id', 'word_by_word_translation', 'short_meaning',
                'detailed_explanation', 'virtues', 'authenticity', 'hadith_reference', 'hadith_number',
                'hadith_grade', 'narrator', 'book_name', 'chapter', 'quran_reference', 'surah', 'ayah',
                'keywords', 'search_keywords', 'alternative_names', 'synonyms', 'tags',
                'difficulty_level', 'reading_time', 'audio_url', 'featured_image',
                'verified_status', 'published_status',
                'seo_title', 'meta_title', 'meta_description', 'canonical_url', 'open_graph', 'twitter_card'
            ]);
        });

        Schema::table('dua_categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id', 'name_roman_urdu', 'slug_urdu', 'seo_title', 'seo_description']);
        });
    }
};
