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
        Schema::create('hadith_narrators', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar')->nullable();
            $table->text('biography')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('hadith_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar')->nullable();
            $table->text('introduction')->nullable();
            $table->string('reliability')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::table('hadith_topics', function (Blueprint $table) {
            $table->string('topic_name_arabic')->nullable()->after('topic_name');
            $table->string('topic_name_urdu')->nullable()->after('topic_name_arabic');
            $table->json('common_misconceptions')->nullable();
        });

        Schema::table('hadiths', function (Blueprint $table) {
            $table->json('related_duas')->nullable();
            $table->json('keywords')->nullable();
            $table->unsignedBigInteger('narrator_id')->nullable();
            $table->unsignedBigInteger('collection_id')->nullable();
            
            $table->foreign('narrator_id')->references('id')->on('hadith_narrators')->onDelete('set null');
            $table->foreign('collection_id')->references('id')->on('hadith_collections')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hadiths', function (Blueprint $table) {
            $table->dropForeign(['narrator_id']);
            $table->dropForeign(['collection_id']);
            $table->dropColumn(['related_duas', 'keywords', 'narrator_id', 'collection_id']);
        });

        Schema::table('hadith_topics', function (Blueprint $table) {
            $table->dropColumn(['topic_name_arabic', 'topic_name_urdu', 'common_misconceptions']);
        });

        Schema::dropIfExists('hadith_collections');
        Schema::dropIfExists('hadith_narrators');
    }
};
