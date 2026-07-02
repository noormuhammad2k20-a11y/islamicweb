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
        Schema::table('islamic_quizzes', function (Blueprint $table) {
            if (Schema::hasColumn('islamic_quizzes', 'category')) {
                $table->dropColumn('category');
            }
            if (!Schema::hasColumn('islamic_quizzes', 'quiz_category_id')) {
                $table->foreignId('quiz_category_id')->nullable()->constrained('quiz_categories')->nullOnDelete();
            }
            if (!Schema::hasColumn('islamic_quizzes', 'slug')) {
                $table->string('slug')->nullable()->unique();
            }
            if (!Schema::hasColumn('islamic_quizzes', 'ayah_reference_id')) {
                $table->foreignId('ayah_reference_id')->nullable()->constrained('ayahs')->nullOnDelete();
            }
            if (!Schema::hasColumn('islamic_quizzes', 'hadith_reference_id')) {
                $table->foreignId('hadith_reference_id')->nullable()->constrained('hadiths')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('islamic_quizzes', function (Blueprint $table) {
            $table->string('category', 100)->nullable();
            
            $table->dropForeign(['quiz_category_id']);
            $table->dropColumn('quiz_category_id');
            
            $table->dropColumn('slug');
            
            $table->dropForeign(['ayah_reference_id']);
            $table->dropColumn('ayah_reference_id');
            
            $table->dropForeign(['hadith_reference_id']);
            $table->dropColumn('hadith_reference_id');
        });
    }
};
