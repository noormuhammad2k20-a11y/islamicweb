<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * BUG-002 fix: Add region differentiation (Pakistan vs Global vs Saudi)
     * Also adds Arabic display fields for proper Arabic date rendering.
     */
    public function up(): void
    {
        Schema::table('hijri_date_caches', function (Blueprint $table) {
            $table->string('region', 20)->default('global')->after('source')
                  ->comment('global, pakistan, saudi, india');
            $table->string('hijri_day_ar', 10)->nullable()->after('hijri_day')
                  ->comment('Arabic numeral day');
            $table->string('hijri_month_ar', 50)->nullable()->after('hijri_month')
                  ->comment('Full Arabic month name');
            $table->boolean('is_verified_sighting')->default(false)->after('region');
        });

        // Drop the old unique constraint on gregorian_date alone
        // and add a composite unique on gregorian_date + region
        Schema::table('hijri_date_caches', function (Blueprint $table) {
            $table->dropUnique('hijri_date_caches_gregorian_date_unique');
            $table->unique(['gregorian_date', 'region'], 'idx_greg_date_region');
        });
    }

    public function down(): void
    {
        Schema::table('hijri_date_caches', function (Blueprint $table) {
            $table->dropUnique('idx_greg_date_region');
            $table->unique('gregorian_date');
            $table->dropColumn(['region', 'hijri_day_ar', 'hijri_month_ar', 'is_verified_sighting']);
        });
    }
};
