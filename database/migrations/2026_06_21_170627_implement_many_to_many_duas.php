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
        Schema::table('duas', function (Blueprint $table) {
            $table->dropForeign(['dua_category_id']);
            $table->dropColumn('dua_category_id');
            $table->string('arabic_text_hash')->unique()->after('id');
        });

        Schema::create('dua_dua_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dua_id')->constrained('duas')->onDelete('cascade');
            $table->foreignId('dua_category_id')->constrained('dua_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('many_duas', function (Blueprint $table) {
            //
        });
    }
};
