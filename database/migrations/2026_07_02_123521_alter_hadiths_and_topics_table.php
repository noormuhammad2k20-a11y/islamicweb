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
            if (!Schema::hasColumn('hadiths', 'narrator')) {
                $table->string('narrator')->nullable();
            }
        });

        Schema::table('hadith_topics', function (Blueprint $table) {
            if (Schema::hasColumn('hadith_topics', 'book')) {
                $table->dropColumn('book');
            }
            if (Schema::hasColumn('hadith_topics', 'chapter')) {
                $table->dropColumn('chapter');
            }
            if (!Schema::hasColumn('hadith_topics', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hadith_topics', function (Blueprint $table) {
            $table->string('book')->nullable();
            $table->string('chapter')->nullable();
            $table->dropColumn('description');
        });

        Schema::table('hadiths', function (Blueprint $table) {
            $table->dropColumn('narrator');
        });
    }
};
