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
        Schema::create('city_prayer_contents', function (Blueprint $table) {
            $table->id();
            $table->string('city_slug', 100)->unique();
            $table->char('country_code', 2);
            $table->text('intro_paragraph')->comment('UNIQUE per city 150+ words');
            $table->text('famous_mosques_list')->nullable()->comment('JSON array');
            $table->text('local_islamic_events')->nullable();
            $table->string('calculation_method', 100)->default('Karachi');
            $table->string('madhab', 20)->default('Hanafi');
            $table->text('dawateislami_time_note')->nullable()->comment('For cities with Dawateislami presence');
            $table->text('eid_prayer_venue')->nullable();
            $table->text('jummah_popular_mosques')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_prayer_contents');
    }
};
