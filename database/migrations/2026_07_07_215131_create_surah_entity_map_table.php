<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_entity_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
            $table->foreignId('entity_id')->constrained('surah_entities')->onDelete('cascade');
            $table->foreignId('ayah_id')->nullable()->constrained('ayahs')->onDelete('set null');
            $table->integer('relevance_score')->default(5); // 1-10
            $table->timestamps();
            $table->index(['surah_id', 'entity_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_entity_map');
    }
};
