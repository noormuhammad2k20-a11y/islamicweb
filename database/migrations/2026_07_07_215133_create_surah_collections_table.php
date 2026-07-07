<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ur')->nullable();
            $table->string('slug')->unique();
            $table->text('description_en')->nullable();
            $table->text('description_ur')->nullable();
            $table->string('collection_type')->default('curated');
            // Values: curated | juz_based | thematic | length_based | revelation_based
            $table->string('meta_title', 70)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('og_image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_collections');
    }
};
