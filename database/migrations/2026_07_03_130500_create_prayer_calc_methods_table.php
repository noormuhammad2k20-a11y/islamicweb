<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prayer_calc_methods', function (Blueprint $table) {
            $table->id();
            $table->integer('aladhan_id')->unique();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->json('params')->nullable()->comment('Fajr/Isha degrees or minutes');
            $table->text('description')->nullable();
            $table->boolean('is_default_for_region')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prayer_calc_methods');
    }
};
