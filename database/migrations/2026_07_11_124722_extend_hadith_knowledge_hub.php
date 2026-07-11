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
        Schema::table('hadith_narrators', function (Blueprint $table) {
            $table->string('birth')->nullable();
            $table->string('death')->nullable();
            $table->string('status')->nullable();
            $table->boolean('companion')->default(true);
        });

        Schema::table('hadith_collections', function (Blueprint $table) {
            $table->text('history')->nullable();
            $table->string('compiler')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hadith_narrators', function (Blueprint $table) {
            $table->dropColumn(['birth', 'death', 'status', 'companion']);
        });

        Schema::table('hadith_collections', function (Blueprint $table) {
            $table->dropColumn(['history', 'compiler']);
        });
    }
};
