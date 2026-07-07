<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_important_ayahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
            $table->foreignId('ayah_id')->constrained('ayahs')->onDelete('cascade');
            $table->string('label_en')->nullable(); // "Ayat ul Kursi", "Last 2 Ayat"
            $table->string('label_ur')->nullable();
            $table->text('significance_en')->nullable();
            $table->text('significance_ur')->nullable();
            $table->string('anchor_id')->nullable(); // CSS anchor e.g. "last-2-ayat"
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->index(['surah_id', 'is_featured']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_important_ayahs');
    }
};
