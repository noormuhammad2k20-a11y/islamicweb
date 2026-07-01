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
        Schema::create('fazilat_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained()->cascadeOnDelete();
            $table->string('question');
            $table->text('answer');
            $table->string('hadith_reference')->nullable();
            $table->enum('verification_status', ['verified', 'commonly_cited'])->default('commonly_cited');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fazilat_entries');
    }
};
