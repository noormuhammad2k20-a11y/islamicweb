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
        if (!Schema::hasTable('hadith_hadith_topic')) {
            Schema::create('hadith_hadith_topic', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('hadith_id');
                $table->unsignedBigInteger('hadith_topic_id');
                $table->timestamps();

                $table->foreign('hadith_id')->references('id')->on('hadiths')->onDelete('cascade');
                $table->foreign('hadith_topic_id')->references('id')->on('hadith_topics')->onDelete('cascade');
                
                $table->unique(['hadith_id', 'hadith_topic_id']);
            });
        }

        Schema::table('hadiths', function (Blueprint $table) {
            if (Schema::hasColumn('hadiths', 'topic_id')) {
                $table->dropForeign(['topic_id']);
                $table->dropColumn('topic_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hadiths', function (Blueprint $table) {
            $table->unsignedBigInteger('topic_id')->nullable();
        });

        Schema::dropIfExists('hadith_hadith_topic');
    }
};
