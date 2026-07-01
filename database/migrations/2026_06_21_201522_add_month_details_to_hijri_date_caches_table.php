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
        Schema::table('hijri_date_caches', function (Blueprint $table) {
            $table->integer('hijri_month_number')->nullable()->after('hijri_month');
            $table->string('gregorian_month_en')->nullable()->after('hijri_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hijri_date_caches', function (Blueprint $table) {
            $table->dropColumn(['hijri_month_number', 'gregorian_month_en']);
        });
    }
};
