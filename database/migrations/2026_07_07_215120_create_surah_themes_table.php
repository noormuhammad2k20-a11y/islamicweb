<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_themes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
            $table->string('theme_title_en');
            $table->string('theme_title_ur')->nullable();
            $table->text('theme_description_en')->nullable();
            $table->text('theme_description_ur')->nullable();
            $table->string('icon_class')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->index('surah_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_themes');
    }
};
