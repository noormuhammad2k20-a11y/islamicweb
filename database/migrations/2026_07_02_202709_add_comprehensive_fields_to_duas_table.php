<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('duas', function (Blueprint $table) {
            $table->string('content_type')->nullable()->after('id')->index(); // 'Hadith', 'Quranic Dua', 'Prophetic Dua', 'Dhikr', 'Tasbeeh', 'Istighfar', 'Salawat'
            $table->string('book_number')->nullable()->after('hadith_number');
            $table->string('chapter_number')->nullable()->after('book_number');
            $table->text('chain_of_narration')->nullable()->after('narrator');
            $table->string('scholar_authentication')->nullable()->after('authenticity');
            $table->string('collection_name')->nullable()->after('book_name');
            $table->json('difficult_words_meanings')->nullable()->after('word_by_word_translation');
            
            // Explanations
            $table->text('lessons_learned')->nullable()->after('detailed_explanation');
            $table->text('practical_benefits')->nullable()->after('benefits');
            $table->text('islamic_guidance')->nullable()->after('practical_benefits');
            $table->text('authenticity_notes')->nullable()->after('islamic_guidance');
            $table->text('important_notes')->nullable()->after('authenticity_notes');
            $table->text('common_mistakes')->nullable()->after('important_notes');
            
            // Recitation Guidelines
            $table->string('when_to_read')->nullable()->after('common_mistakes');
            $table->string('how_many_times')->nullable()->after('when_to_read');
            $table->string('best_time')->nullable()->after('how_many_times');
            $table->json('recommended_occasions')->nullable()->after('best_time');
            $table->string('daily_routine_placement')->nullable()->after('recommended_occasions');
            
            // FAQs
            $table->json('faqs')->nullable()->after('daily_routine_placement');
        });

        // Set default content_type for existing records that are hadiths
        DB::table('duas')
            ->whereNotNull('hadith_number')
            ->whereNull('content_type')
            ->update(['content_type' => 'Hadith']);
            
        // Set default content_type for everything else as 'Prophetic Dua' for now
        DB::table('duas')
            ->whereNull('content_type')
            ->update(['content_type' => 'Prophetic Dua']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('duas', function (Blueprint $table) {
            $table->dropColumn([
                'content_type',
                'book_number',
                'chapter_number',
                'chain_of_narration',
                'scholar_authentication',
                'collection_name',
                'difficult_words_meanings',
                'lessons_learned',
                'practical_benefits',
                'islamic_guidance',
                'authenticity_notes',
                'important_notes',
                'common_mistakes',
                'when_to_read',
                'how_many_times',
                'best_time',
                'recommended_occasions',
                'daily_routine_placement',
                'faqs'
            ]);
        });
    }
};
