<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('islamic_month_content', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('month_number')->unique();
            $table->string('month_name_en', 50);
            $table->string('month_name_urdu', 100);
            $table->string('month_name_arabic', 100);
            $table->text('significance_en')->comment('300+ words unique content');
            $table->text('significance_urdu')->nullable();
            $table->json('important_dates')->nullable()->comment('[{"date":"10","event":"Ashura"}]');
            $table->text('recommended_ibadah')->nullable();
            $table->text('hadith_about_month')->nullable();
            $table->string('meta_title', 160)->nullable();
            $table->string('meta_description', 320)->nullable();
            $table->string('slug', 100)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('islamic_month_content');
    }
};
