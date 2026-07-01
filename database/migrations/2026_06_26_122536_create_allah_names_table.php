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
        Schema::create('allah_names', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->text('arabic');
            $table->string('transliteration');
            $table->text('meaning_english');
            $table->text('meaning_urdu')->nullable();
            $table->text('benefits')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allah_names');
    }
};
