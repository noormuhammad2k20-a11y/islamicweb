<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * BUG-003/008 fix: Add method_name for human-readable prayer method.
     * Note: We keep fajr/sunrise/dhuhr/asr/maghrib/isha as VARCHAR (existing data uses "04:18" format).
     * Standardizing to TIME would break existing rows. Instead we add method_name for display.
     */
    public function up(): void
    {
        Schema::table('prayer_times', function (Blueprint $table) {
            $table->string('method_name', 100)->nullable()->after('calc_method')
                  ->comment('Human-readable method name, e.g., University of Islamic Sciences, Karachi');
            $table->time('jumuah_time')->nullable()->after('method_name')
                  ->comment('Friday prayer time');
        });

        // Add performance index
        if (!Schema::hasIndex('prayer_times', 'idx_city_date')) {
            Schema::table('prayer_times', function (Blueprint $table) {
                $table->index(['city_id', 'date'], 'idx_city_date');
            });
        }
    }

    public function down(): void
    {
        Schema::table('prayer_times', function (Blueprint $table) {
            $table->dropIndex('idx_city_date');
            $table->dropColumn(['method_name', 'jumuah_time']);
        });
    }
};
