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
        Schema::create('hadiths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('hadith_topics')->cascadeOnDelete();
            $table->text('arabic_text');
            $table->text('english_translation');
            $table->text('urdu_translation')->nullable();
            $table->string('reference');
            $table->string('grade')->nullable();
            $table->string('slug')->unique();
            $table->string('book_name');
            $table->string('chapter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadiths');
    }
};
