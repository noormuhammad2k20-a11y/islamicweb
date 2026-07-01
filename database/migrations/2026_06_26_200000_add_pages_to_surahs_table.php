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
        Schema::table('surahs', function (Blueprint $table) {
            $table->integer('start_page')->nullable()->after('ruku_count');
            $table->integer('end_page')->nullable()->after('start_page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surahs', function (Blueprint $table) {
            $table->dropColumn(['start_page', 'end_page']);
        });
    }
};
