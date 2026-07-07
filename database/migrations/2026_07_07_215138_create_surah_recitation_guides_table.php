<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_recitation_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
            $table->string('reciter_name_en');
            $table->string('reciter_name_ur')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('style')->nullable(); // Murattal | Mujawwad | Hadr
            $table->text('description_en')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->index(['surah_id', 'is_featured']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_recitation_guides');
    }
};
