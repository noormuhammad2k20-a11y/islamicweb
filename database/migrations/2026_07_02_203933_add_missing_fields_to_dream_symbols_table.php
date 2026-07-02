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
        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->string('chapter')->nullable()->after('source_book');
            $table->string('page_number')->nullable()->after('chapter');
            $table->text('authenticity_notes')->nullable()->after('page_number');
            $table->boolean('verified_status')->default(0)->after('published_status');
            $table->boolean('featured_status')->default(0)->after('verified_status');

            $table->fullText(['symbol_urdu', 'symbol_english', 'symbol_arabic', 'symbol_roman_urdu', 'search_keywords'], 'dreams_fulltext_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->dropFullText('dreams_fulltext_index');
            $table->dropColumn(['chapter', 'page_number', 'authenticity_notes', 'verified_status', 'featured_status']);
        });
    }
};
