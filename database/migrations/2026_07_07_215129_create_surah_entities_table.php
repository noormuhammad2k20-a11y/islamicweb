<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surah_entities', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type');
            // Values: prophet | angel | place | battle | tribe | nation |
            //   concept | dua | event | object
            $table->string('entity_name_en');
            $table->string('entity_name_ar')->nullable();
            $table->string('entity_name_ur')->nullable();
            $table->text('description_en')->nullable();
            $table->string('slug')->unique();
            $table->string('wikipedia_slug')->nullable();
            $table->timestamps();
            $table->index('entity_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surah_entities');
    }
};
