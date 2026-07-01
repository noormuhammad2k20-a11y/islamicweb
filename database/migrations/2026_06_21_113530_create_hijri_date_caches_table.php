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
        Schema::create('hijri_date_caches', function (Blueprint $table) {
            $table->id();
            $table->date('gregorian_date')->unique();
            $table->integer('hijri_day');
            $table->string('hijri_month');
            $table->integer('hijri_year');
            $table->string('source')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hijri_date_caches');
    }
};
