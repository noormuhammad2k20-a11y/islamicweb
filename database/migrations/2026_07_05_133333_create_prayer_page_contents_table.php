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
        Schema::create('prayer_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('city_slug', 100);
            $table->enum('prayer_name', ['fajr', 'zuhr', 'asr', 'maghrib', 'isha']);
            $table->text('content_en')->comment('200+ words unique per prayer per city');
            $table->text('content_urdu')->nullable();
            $table->text('rakats_info');
            $table->text('fiqh_details');
            $table->text('hadith_reference')->nullable();
            $table->timestamps();

            $table->unique(['city_slug', 'prayer_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayer_page_contents');
    }
};
