<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_content_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
            $table->string('block_type');
            // Allowed values: overview | history | revelation_context | name_explanation |
            //   main_themes | key_lessons | authentic_virtues | reading_recommendation |
            //   misconceptions | word_meaning | summary | study_notes
            $table->text('content_en')->nullable();
            $table->text('content_ur')->nullable();
            $table->text('content_ar')->nullable();
            $table->string('hadith_reference')->nullable(); // e.g. "Sahih Muslim 656"
            $table->enum('authenticity', [
                'sahih', 'hasan', 'daif', 'mawdu', 'general_knowledge', 'scholarly_opinion'
            ])->default('general_knowledge');
            $table->string('source_name')->nullable(); // "Ibn Kathir", "Maududi", etc.
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->index(['surah_id', 'block_type', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_content_blocks');
    }
};
