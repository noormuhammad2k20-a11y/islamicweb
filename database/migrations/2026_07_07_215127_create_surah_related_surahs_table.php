<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_related_surahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
            $table->foreignId('related_surah_id')->constrained('surahs')->onDelete('cascade');
            $table->string('relation_type')->nullable();
            // Values: same_juz | same_prophet | same_theme | same_revelation_type |
            //   recommended_after | thematically_paired
            $table->string('relation_reason_en')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->unique(['surah_id', 'related_surah_id']);
            $table->index('surah_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_related_surahs');
    }
};
