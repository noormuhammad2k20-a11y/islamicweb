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
        Schema::create('dream_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_english');
            $table->string('name_urdu')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('dream_category_dream_symbol', function (Blueprint $table) {
            $table->foreignId('dream_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dream_symbol_id')->constrained()->cascadeOnDelete();
            $table->primary(['dream_category_id', 'dream_symbol_id'], 'dream_category_symbol_primary');
        });

        Schema::create('related_dream_symbols', function (Blueprint $table) {
            $table->foreignId('dream_symbol_id')->constrained()->cascadeOnDelete();
            $table->foreignId('related_symbol_id')->constrained('dream_symbols')->cascadeOnDelete();
            $table->primary(['dream_symbol_id', 'related_symbol_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_dream_symbols');
        Schema::dropIfExists('dream_category_dream_symbol');
        Schema::dropIfExists('dream_categories');
    }
};
