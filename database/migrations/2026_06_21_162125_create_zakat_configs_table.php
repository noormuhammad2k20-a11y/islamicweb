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
        Schema::create('zakat_configs', function (Blueprint $table) {
            $table->id();
            $table->decimal('gold_price_per_gram', 10, 2)->default(0);
            $table->decimal('silver_price_per_gram', 10, 2)->default(0);
            $table->string('currency_code', 10)->default('PKR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zakat_configs');
    }
};
