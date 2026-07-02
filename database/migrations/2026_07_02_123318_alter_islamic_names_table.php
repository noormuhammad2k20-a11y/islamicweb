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
        Schema::table('islamic_names', function (Blueprint $table) {
            if (!Schema::hasColumn('islamic_names', 'pronunciation')) {
                $table->string('pronunciation')->nullable();
            }
            if (!Schema::hasColumn('islamic_names', 'initial_letter')) {
                $table->string('initial_letter', 1)->nullable()->index();
            }
            if (!Schema::hasColumn('islamic_names', 'name_length')) {
                $table->integer('name_length')->nullable()->index();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('islamic_names', function (Blueprint $table) {
            $table->dropColumn(['pronunciation', 'initial_letter', 'name_length']);
        });
    }
};
