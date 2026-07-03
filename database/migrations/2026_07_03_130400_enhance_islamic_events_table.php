<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('islamic_events', function (Blueprint $table) {
            $table->boolean('is_public_holiday')->default(false)->after('description');
            $table->json('countries_observing')->nullable()->after('is_public_holiday')
                  ->comment('Array of country IDs that observe this event');
            $table->date('gregorian_date_2026')->nullable()->after('countries_observing');
            $table->date('gregorian_date_2027')->nullable()->after('gregorian_date_2026');
        });

        // Add index for querying events by Hijri month + day
        Schema::table('islamic_events', function (Blueprint $table) {
            $table->index(['hijri_month_id', 'hijri_day'], 'idx_month_day');
        });
    }

    public function down(): void
    {
        Schema::table('islamic_events', function (Blueprint $table) {
            $table->dropIndex('idx_month_day');
            $table->dropColumn(['is_public_holiday', 'countries_observing', 'gregorian_date_2026', 'gregorian_date_2027']);
        });
    }
};
