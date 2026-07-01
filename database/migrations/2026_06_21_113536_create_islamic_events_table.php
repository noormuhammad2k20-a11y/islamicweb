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
        Schema::create('islamic_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('hijri_month_id')->constrained()->cascadeOnDelete();
            $table->integer('hijri_day');
            $table->text('description')->nullable();
            $table->string('event_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islamic_events');
    }
};
