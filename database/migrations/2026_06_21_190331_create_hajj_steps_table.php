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
        Schema::create('hajj_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hajj_guide_id')->constrained()->onDelete('cascade');
            $table->integer('day_number')->nullable();
            $table->integer('step_number');
            $table->string('title');
            $table->text('content');
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hajj_steps');
    }
};
