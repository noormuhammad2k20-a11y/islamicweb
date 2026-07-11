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
            $table->string('chapter_number')->nullable();
            $table->text('grade_explanation')->nullable();
            $table->text('practical_applications')->nullable();
            $table->text('benefits')->nullable();
        });

        Schema::table('hadith_topics', function (Blueprint $table) {
            $table->text('overview')->nullable();
            $table->text('importance')->nullable();
            $table->text('lessons')->nullable();
            $table->text('benefits')->nullable();
            $table->text('practical_guidance')->nullable();
            $table->text('misconceptions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hadiths', function (Blueprint $table) {
            $table->dropColumn(['chapter_number', 'grade_explanation', 'practical_applications', 'benefits']);
        });

        Schema::table('hadith_topics', function (Blueprint $table) {
            $table->dropColumn(['overview', 'importance', 'lessons', 'benefits', 'practical_guidance', 'misconceptions']);
        });
    }
};
