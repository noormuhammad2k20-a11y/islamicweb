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
        Schema::create('dream_related_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dream_id');
            $table->unsignedBigInteger('related_dream_id');
            $table->string('relation_type')->default('similar'); // similar, opposite
            $table->timestamps();

            $table->foreign('dream_id')->references('id')->on('dream_symbols')->onDelete('cascade');
            $table->foreign('related_dream_id')->references('id')->on('dream_symbols')->onDelete('cascade');
            
            $table->unique(['dream_id', 'related_dream_id', 'relation_type'], 'dream_relation_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dream_related_links');
    }
};
