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
        Schema::create('wazifa_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_english');
            $table->string('name_urdu')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('dua_wazifa', function (Blueprint $table) {
            $table->foreignId('dua_id')->constrained('duas')->cascadeOnDelete();
            $table->foreignId('wazifa_id')->constrained('wazaif')->cascadeOnDelete();
            $table->primary(['dua_id', 'wazifa_id']);
        });

        Schema::create('surah_wazifa', function (Blueprint $table) {
            $table->foreignId('surah_id')->constrained('surahs')->cascadeOnDelete();
            $table->foreignId('wazifa_id')->constrained('wazaif')->cascadeOnDelete();
            $table->primary(['surah_id', 'wazifa_id']);
        });

        Schema::create('hadith_wazifa', function (Blueprint $table) {
            $table->foreignId('hadith_id')->constrained('hadiths')->cascadeOnDelete();
            $table->foreignId('wazifa_id')->constrained('wazaif')->cascadeOnDelete();
            $table->primary(['hadith_id', 'wazifa_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadith_wazifa');
        Schema::dropIfExists('surah_wazifa');
        Schema::dropIfExists('dua_wazifa');
        Schema::dropIfExists('wazifa_categories');
    }
};
