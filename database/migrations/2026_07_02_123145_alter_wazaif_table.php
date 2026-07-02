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
        Schema::table('wazaif', function (Blueprint $table) {
            if (Schema::hasColumn('wazaif', 'purpose')) {
                $table->dropColumn('purpose');
            }
            if (!Schema::hasColumn('wazaif', 'wazifa_category_id')) {
                $table->foreignId('wazifa_category_id')->nullable()->constrained('wazifa_categories')->nullOnDelete();
            }
            if (!Schema::hasColumn('wazaif', 'repetition_count')) {
                $table->integer('repetition_count')->nullable();
            }
            if (!Schema::hasColumn('wazaif', 'best_time')) {
                $table->string('best_time')->nullable();
            }
            if (!Schema::hasColumn('wazaif', 'precautions')) {
                $table->text('precautions')->nullable();
            }
            if (!Schema::hasColumn('wazaif', 'transliteration')) {
                $table->text('transliteration')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wazaif', function (Blueprint $table) {
            $table->string('purpose')->nullable();
            
            $table->dropForeign(['wazifa_category_id']);
            $table->dropColumn('wazifa_category_id');
            
            $table->dropColumn('repetition_count');
            $table->dropColumn('best_time');
            $table->dropColumn('precautions');
            $table->dropColumn('transliteration');
        });
    }
};
