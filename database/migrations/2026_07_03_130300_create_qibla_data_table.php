<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qibla_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->decimal('qibla_direction', 6, 3)->comment('Degrees from North');
            $table->decimal('distance_to_kaaba_km', 8, 2)->nullable();
            $table->timestamp('calculated_at')->nullable();
            $table->timestamps();

            $table->unique('city_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qibla_data');
    }
};
