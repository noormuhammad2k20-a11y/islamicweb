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
        Schema::create('world_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->string('country', 100);
            $table->char('country_code', 2);
            $table->string('region', 100)->nullable();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('timezone', 50);
            $table->integer('population')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->string('meta_title', 160)->nullable();
            $table->string('meta_description', 320)->nullable();
            $table->text('city_intro')->nullable()->comment('Unique 200-word intro per city');
            $table->text('famous_mosques')->nullable()->comment('JSON: mosque names');
            $table->text('islamic_history')->nullable()->comment('Unique Islamic history of city');
            $table->timestamps();
            
            $table->index('country_code');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('world_cities');
    }
};
