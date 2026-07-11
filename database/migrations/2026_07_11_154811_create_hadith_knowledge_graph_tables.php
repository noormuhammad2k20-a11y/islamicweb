<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Books
        Schema::create('hadith_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->string('name_en');
            $table->string('name_ar')->nullable();
            $table->string('book_number')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('hadith_collections')->onDelete('cascade');
        });

        // 2. Chapters
        Schema::create('hadith_chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hadith_book_id')->nullable();
            $table->string('name_en');
            $table->string('name_ar')->nullable();
            $table->string('chapter_number')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();

            $table->foreign('hadith_book_id')->references('id')->on('hadith_books')->onDelete('cascade');
        });

        // 3. Keywords
        Schema::dropIfExists('hadith_keywords');
        Schema::create('hadith_keywords', function (Blueprint $table) {
            $table->id();
            $table->string('keyword');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 4. Pivot: Hadith <-> Book
        Schema::create('hadith_hadith_book', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hadith_id');
            $table->unsignedBigInteger('hadith_book_id');

            $table->foreign('hadith_id')->references('id')->on('hadiths')->onDelete('cascade');
            $table->foreign('hadith_book_id')->references('id')->on('hadith_books')->onDelete('cascade');
            $table->unique(['hadith_id', 'hadith_book_id']);
        });

        // 5. Pivot: Hadith <-> Chapter
        Schema::create('hadith_hadith_chapter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hadith_id');
            $table->unsignedBigInteger('hadith_chapter_id');

            $table->foreign('hadith_id')->references('id')->on('hadiths')->onDelete('cascade');
            $table->foreign('hadith_chapter_id')->references('id')->on('hadith_chapters')->onDelete('cascade');
            $table->unique(['hadith_id', 'hadith_chapter_id']);
        });

        // 6. Pivot: Hadith <-> Keyword
        Schema::create('hadith_hadith_keyword', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hadith_id');
            $table->unsignedBigInteger('hadith_keyword_id');

            $table->foreign('hadith_id')->references('id')->on('hadiths')->onDelete('cascade');
            $table->foreign('hadith_keyword_id')->references('id')->on('hadith_keywords')->onDelete('cascade');
            $table->unique(['hadith_id', 'hadith_keyword_id']);
        });

        // 7. Pivot: Hadith <-> Related Hadith
        Schema::create('hadith_related', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hadith_id');
            $table->unsignedBigInteger('related_hadith_id');

            $table->foreign('hadith_id')->references('id')->on('hadiths')->onDelete('cascade');
            $table->foreign('related_hadith_id')->references('id')->on('hadiths')->onDelete('cascade');
            $table->unique(['hadith_id', 'related_hadith_id']);
        });

        // 8. Pivot: Topic <-> Topic
        Schema::create('hadith_topic_related', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id');
            $table->unsignedBigInteger('related_topic_id');

            $table->foreign('topic_id')->references('id')->on('hadith_topics')->onDelete('cascade');
            $table->foreign('related_topic_id')->references('id')->on('hadith_topics')->onDelete('cascade');
            $table->unique(['topic_id', 'related_topic_id']);
        });
        
        // 9. Add direct foreign keys to hadiths for book/chapter optionally, but pivot tables cover it.
        // We will just add `hadith_book_id` and `hadith_chapter_id` as direct relationships too for ease.
        Schema::table('hadiths', function (Blueprint $table) {
            $table->unsignedBigInteger('hadith_book_id')->nullable();
            $table->unsignedBigInteger('hadith_chapter_id')->nullable();
            $table->foreign('hadith_book_id')->references('id')->on('hadith_books')->onDelete('set null');
            $table->foreign('hadith_chapter_id')->references('id')->on('hadith_chapters')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hadiths', function (Blueprint $table) {
            $table->dropForeign(['hadith_book_id']);
            $table->dropForeign(['hadith_chapter_id']);
            $table->dropColumn('hadith_book_id');
            $table->dropColumn('hadith_chapter_id');
        });

        Schema::dropIfExists('hadith_topic_related');
        Schema::dropIfExists('hadith_related');
        Schema::dropIfExists('hadith_hadith_keyword');
        Schema::dropIfExists('hadith_hadith_chapter');
        Schema::dropIfExists('hadith_hadith_book');
        Schema::dropIfExists('hadith_keywords');
        Schema::dropIfExists('hadith_chapters');
        Schema::dropIfExists('hadith_books');
    }
};
