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
        Schema::table('cities', function (Blueprint $table) {
            $table->string('state')->nullable()->after('country_id');
            $table->string('name_ar')->nullable()->after('name');
            $table->string('name_ur')->nullable()->after('name_ar');
            $table->json('location_data')->nullable()->after('longitude')->comment('Cached data from Geoapify/Nominatim');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn(['state', 'name_ar', 'name_ur', 'location_data']);
        });
    }
};
