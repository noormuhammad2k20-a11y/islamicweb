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
        Schema::table('dream_categories', function (Blueprint $table) {
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
        });

        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('positive_meaning')->nullable();
            $table->text('negative_meaning')->nullable();
            $table->json('tags')->nullable();
            $table->string('icon')->nullable();
            $table->string('featured_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dream_categories', function (Blueprint $table) {
            $table->dropColumn(['icon', 'description', 'parent_id']);
        });

        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->dropColumn(['category_id', 'parent_id', 'positive_meaning', 'negative_meaning', 'tags', 'icon', 'featured_image']);
        });
    }
};
