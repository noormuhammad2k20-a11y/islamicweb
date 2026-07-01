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
        Schema::create('surahs', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->string('name_ar');
            $table->string('name_ur');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->integer('ayah_count');
            $table->string('para_juz')->nullable();
            $table->string('revelation_place')->nullable();
            $table->longText('arabic_text')->nullable();
            $table->longText('urdu_translation')->nullable();
            $table->longText('english_translation')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('pdf_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surahs');
    }
};
