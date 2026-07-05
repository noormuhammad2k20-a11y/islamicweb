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
        Schema::dropIfExists('city_prayer_contents');

        Schema::create('city_prayer_contents', function (Blueprint $table) {
            $table->id();
            $table->string('city_slug', 100)->unique();
            $table->string('city_name', 100);
            $table->string('country', 50)->default('Pakistan');
            $table->char('country_code', 2)->default('PK');
            $table->text('article_en');
            $table->text('article_urdu')->nullable();
            $table->json('famous_mosques')->nullable()->comment('["Masjid X","Masjid Y"]');
            $table->text('islamic_history');
            $table->text('calculation_note')->nullable();
            $table->text('eid_prayer_note')->nullable();
            $table->text('jummah_note')->nullable();
            $table->text('special_note')->nullable()->comment('e.g. Dawateislami for Karachi, Awqaf for Dubai');
            $table->timestamps();

            $table->index('country_code');
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
