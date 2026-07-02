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
        Schema::table('duas', function (Blueprint $table) {
            if (!Schema::hasColumn('duas', 'benefits')) {
                $table->text('benefits')->nullable();
            }
            if (!Schema::hasColumn('duas', 'audio_duration')) {
                $table->integer('audio_duration')->nullable()->comment('Duration in seconds');
            }
            if (!Schema::hasColumn('duas', 'audio_format')) {
                $table->string('audio_format')->nullable();
            }
            
            // Drop unique constraint on arabic_text_hash if it exists.
            $indexes = Schema::getIndexes('duas');
            $hasUnique = false;
            foreach ($indexes as $index) {
                if ($index['name'] === 'duas_arabic_text_hash_unique') {
                    $hasUnique = true;
                    break;
                }
            }
            if ($hasUnique) {
                $table->dropUnique('duas_arabic_text_hash_unique');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('duas', function (Blueprint $table) {
            $table->dropColumn(['benefits', 'audio_duration', 'audio_format']);
            
            // It is non-trivial to easily restore a unique constraint without knowing previous state,
            // so we skip recreating it in the down method or recreate it if strictly necessary.
            // $table->unique('arabic_text_hash');
        });
    }
};
