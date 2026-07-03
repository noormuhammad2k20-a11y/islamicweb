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
        Schema::table('prayer_times', function (Blueprint $table) {
            $table->time('imsak')->nullable()->after('date');
            $table->time('midnight')->nullable()->after('isha');
            $table->time('last_third')->nullable()->after('midnight');
            $table->string('method')->nullable()->after('last_third')->comment('Calculation method used');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prayer_times', function (Blueprint $table) {
            $table->dropColumn(['imsak', 'midnight', 'last_third', 'method']);
        });
    }
};
