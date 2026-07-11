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
        Schema::table('hadiths', function (Blueprint $table) {
            $table->text('explanation')->nullable();
            $table->json('key_lessons')->nullable();
            $table->json('tags')->nullable();
        });

        Schema::table('hadith_topics', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('introduction')->nullable();
            $table->json('quick_stats')->nullable();
            $table->json('quran_references')->nullable();
            $table->json('faqs')->nullable();
            $table->json('related_articles')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hadith_topics', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title', 'meta_description', 'introduction', 'quick_stats',
                'quran_references', 'faqs', 'related_articles'
            ]);
        });

        Schema::table('hadiths', function (Blueprint $table) {
            $table->dropColumn(['explanation', 'key_lessons', 'tags']);
        });
    }
};
