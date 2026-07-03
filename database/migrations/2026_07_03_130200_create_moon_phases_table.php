<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('moon_phases', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->string('phase_name', 50);
            $table->decimal('phase_angle', 5, 2)->nullable();
            $table->decimal('illumination_pct', 5, 2)->nullable();
            $table->tinyInteger('days_to_next_new_moon')->nullable();
            $table->boolean('is_crescent_visible')->default(false)
                  ->comment('Critical for Hijri month start');
            $table->timestamps();

            $table->index('date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moon_phases');
    }
};
