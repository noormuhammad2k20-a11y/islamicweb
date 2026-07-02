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
        Schema::table('dream_symbols', function (Blueprint $table) {
            if (!Schema::hasColumn('dream_symbols', 'initial_letter')) {
                $table->string('initial_letter', 1)->nullable()->index();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dream_symbols', function (Blueprint $table) {
            $table->dropColumn('initial_letter');
        });
    }
};
