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
        Schema::create('name_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_english');
            $table->string('name_urdu')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('islamic_name_name_category', function (Blueprint $table) {
            $table->foreignId('islamic_name_id')->constrained('islamic_names')->cascadeOnDelete();
            $table->foreignId('name_category_id')->constrained('name_categories')->cascadeOnDelete();
            $table->primary(['islamic_name_id', 'name_category_id'], 'islamic_name_category_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islamic_name_name_category');
        Schema::dropIfExists('name_categories');
    }
};
