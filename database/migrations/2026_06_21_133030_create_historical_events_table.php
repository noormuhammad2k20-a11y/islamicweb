<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historical_events', function (Blueprint $table) {
            $table->id();
            $table->integer('hijri_day');
            $table->string('hijri_month');
            $table->integer('hijri_year')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('source_note');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historical_events');
    }
};
