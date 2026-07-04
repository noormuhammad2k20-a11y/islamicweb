<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('city_islamic_content', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->string('city_name', 100);
            $table->string('city_slug', 100)->unique();
            $table->text('islamic_history')->comment('Unique per city — 200+ words');
            $table->text('famous_mosques')->nullable()->comment('JSON array of mosque names');
            $table->text('local_events')->nullable()->comment('Local Islamic events');
            $table->string('meta_title', 160)->nullable();
            $table->string('meta_description', 320)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('city_islamic_content');
    }
};
