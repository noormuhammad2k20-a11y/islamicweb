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
        Schema::create('duas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dua_category_id')->constrained('dua_categories')->onDelete('cascade');
            $table->string('title_english');
            $table->string('title_urdu');
            $table->text('arabic_text');
            $table->text('transliteration');
            $table->text('translation');
            $table->string('reference_source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duas');
    }
};
