<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wazaif', function (Blueprint $table) {
            $table->text('english_translation')->nullable()->after('title_english');
            $table->text('urdu_translation')->nullable()->after('title_urdu');
            $table->text('benefits')->nullable();
            $table->string('frequency')->nullable();
            $table->string('before_after_salah')->nullable();
            $table->text('conditions')->nullable();
            $table->text('recommended_situations')->nullable();
            
            $table->string('book_name')->nullable();
            $table->string('chapter')->nullable();
            $table->string('hadith_number')->nullable();
            $table->string('authenticity_grade')->nullable();
            $table->string('scholar_verification')->nullable();
            $table->text('reference_details')->nullable();
            
            $table->integer('views_count')->default(0);
            $table->string('difficulty_level')->nullable();
            
            // Drop the old one-to-many column
            if (Schema::hasColumn('wazaif', 'wazifa_category_id')) {
                // Ignore foreign key drop error if it doesn't exist
                try {
                    \Illuminate\Support\Facades\DB::statement('ALTER TABLE wazaif DROP FOREIGN KEY wazaif_wazifa_category_id_foreign');
                } catch (\Exception $e) {}
                
                $table->dropColumn('wazifa_category_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('wazaif', function (Blueprint $table) {
            $table->dropColumn([
                'english_translation', 'urdu_translation', 'benefits', 'frequency',
                'before_after_salah', 'conditions', 'recommended_situations',
                'book_name', 'chapter', 'hadith_number', 'authenticity_grade',
                'scholar_verification', 'reference_details', 'views_count', 'difficulty_level'
            ]);
            $table->foreignId('wazifa_category_id')->nullable()->constrained('wazifa_categories')->nullOnDelete();
        });
    }
};
