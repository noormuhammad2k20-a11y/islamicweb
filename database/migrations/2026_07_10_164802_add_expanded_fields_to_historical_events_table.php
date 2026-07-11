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
        Schema::table('historical_events', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->date('gregorian_date')->nullable()->after('hijri_year');
            $table->integer('century')->nullable()->after('hijri_year');
            $table->string('event_type')->nullable()->after('century');
            $table->string('category')->nullable()->after('event_type');
            
            $table->longText('full_history')->nullable()->after('description');
            $table->longText('historical_context')->nullable()->after('full_history');
            $table->text('lessons')->nullable()->after('historical_context');
            
            $table->string('location')->nullable()->after('lessons');
            $table->string('country')->nullable()->after('location');
            $table->decimal('latitude', 10, 8)->nullable()->after('country');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            
            $table->string('dynasty')->nullable()->after('longitude');
            $table->string('caliph')->nullable()->after('dynasty');
            $table->string('related_prophet')->nullable()->after('caliph');
            $table->string('related_companion')->nullable()->after('related_prophet');
            $table->string('related_scholar')->nullable()->after('related_companion');
            
            $table->json('related_personalities')->nullable()->after('related_scholar');
            $table->json('quran_references')->nullable()->after('related_personalities');
            $table->json('hadith_references')->nullable()->after('quran_references');
            $table->json('authentic_sources')->nullable()->after('hadith_references');
            $table->json('images')->nullable()->after('authentic_sources');
            $table->json('tags')->nullable()->after('images');
            
            $table->string('seo_title')->nullable()->after('tags');
            $table->text('meta_description')->nullable()->after('seo_title');
            $table->string('canonical_url')->nullable()->after('meta_description');
            $table->json('og_data')->nullable()->after('canonical_url');
            $table->json('twitter_data')->nullable()->after('og_data');
            
            $table->json('related_events')->nullable()->after('twitter_data');
            $table->json('related_articles')->nullable()->after('related_events');
            $table->json('related_months')->nullable()->after('related_articles');
            $table->json('related_faqs')->nullable()->after('related_months');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historical_events', function (Blueprint $table) {
            $table->dropColumn([
                'slug', 'gregorian_date', 'century', 'event_type', 'category',
                'full_history', 'historical_context', 'lessons',
                'location', 'country', 'latitude', 'longitude',
                'dynasty', 'caliph', 'related_prophet', 'related_companion', 'related_scholar',
                'related_personalities', 'quran_references', 'hadith_references', 'authentic_sources',
                'images', 'tags',
                'seo_title', 'meta_description', 'canonical_url', 'og_data', 'twitter_data',
                'related_events', 'related_articles', 'related_months', 'related_faqs'
            ]);
        });
    }
};
