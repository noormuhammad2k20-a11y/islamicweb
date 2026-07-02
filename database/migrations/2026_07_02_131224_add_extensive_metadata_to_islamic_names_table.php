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
        Schema::table('islamic_names', function (Blueprint $table) {
            $columns = [
                'name_urdu' => fn($t) => $t->string('name_urdu')->nullable(),
                'transliteration' => fn($t) => $t->string('transliteration')->nullable(),
                'meaning_english' => fn($t) => $t->text('meaning_english')->nullable(),
                'meaning_urdu' => fn($t) => $t->text('meaning_urdu')->nullable(),
                'literal_meaning' => fn($t) => $t->string('literal_meaning')->nullable(),
                'detailed_meaning' => fn($t) => $t->text('detailed_meaning')->nullable(),
                'language' => fn($t) => $t->string('language')->nullable(),
                'country' => fn($t) => $t->string('country')->nullable(),
                'religion' => fn($t) => $t->string('religion')->nullable(),
                'category' => fn($t) => $t->string('category')->nullable()->index(),
                'is_modern' => fn($t) => $t->boolean('is_modern')->default(false),
                'is_traditional' => fn($t) => $t->boolean('is_traditional')->default(false),
                'is_quranic' => fn($t) => $t->boolean('is_quranic')->default(false)->index(),
                'quran_reference' => fn($t) => $t->string('quran_reference')->nullable(),
                'surah' => fn($t) => $t->string('surah')->nullable(),
                'ayah' => fn($t) => $t->string('ayah')->nullable(),
                'is_prophet_name' => fn($t) => $t->boolean('is_prophet_name')->default(false)->index(),
                'is_sahabi' => fn($t) => $t->boolean('is_sahabi')->default(false)->index(),
                'is_sahabiyah' => fn($t) => $t->boolean('is_sahabiyah')->default(false)->index(),
                'is_tabii' => fn($t) => $t->boolean('is_tabii')->default(false)->index(),
                'is_scholar' => fn($t) => $t->boolean('is_scholar')->default(false)->index(),
                'is_historical_personality' => fn($t) => $t->boolean('is_historical_personality')->default(false)->index(),
                'biography' => fn($t) => $t->text('biography')->nullable(),
                'islamic_significance' => fn($t) => $t->text('islamic_significance')->nullable(),
                'famous_personalities' => fn($t) => $t->text('famous_personalities')->nullable(),
                'similar_names' => fn($t) => $t->json('similar_names')->nullable(),
                'related_names' => fn($t) => $t->json('related_names')->nullable(),
                'alternative_spellings' => fn($t) => $t->json('alternative_spellings')->nullable(),
                'nicknames' => fn($t) => $t->json('nicknames')->nullable(),
                'popularity' => fn($t) => $t->string('popularity')->nullable(),
                'countries_where_used' => fn($t) => $t->json('countries_where_used')->nullable(),
                'root_letters' => fn($t) => $t->string('root_letters')->nullable(),
                'search_keywords' => fn($t) => $t->text('search_keywords')->nullable(),
                'seo_title' => fn($t) => $t->string('seo_title')->nullable(),
                'seo_description' => fn($t) => $t->text('seo_description')->nullable(),
                'faq' => fn($t) => $t->json('faq')->nullable(),
            ];

            foreach ($columns as $name => $closure) {
                if (!Schema::hasColumn('islamic_names', $name)) {
                    $closure($table);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('islamic_names', function (Blueprint $table) {
            $table->dropColumn([
                'name_urdu', 'transliteration', 'meaning_english', 'meaning_urdu', 
                'literal_meaning', 'detailed_meaning', 'language', 'country', 'religion', 
                'category', 'is_modern', 'is_traditional', 'is_quranic', 'quran_reference', 
                'surah', 'ayah', 'is_prophet_name', 'is_sahabi', 'is_sahabiyah', 'is_tabii', 
                'is_scholar', 'is_historical_personality', 'biography', 'islamic_significance', 
                'famous_personalities', 'similar_names', 'related_names', 'alternative_spellings', 
                'nicknames', 'popularity', 'countries_where_used', 'root_letters', 
                'search_keywords', 'seo_title', 'seo_description', 'faq'
            ]);
        });
    }
};
