<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('islamic_year_events', function (Blueprint $table) {
            $table->id();
            $table->integer('hijri_year')->index();
            $table->integer('gregorian_year')->index();
            $table->string('event_name', 255);
            $table->string('event_name_urdu', 255)->nullable();
            $table->string('hijri_date', 50)->nullable();
            $table->date('gregorian_date')->nullable();
            $table->enum('event_type', ['eid', 'ramadan', 'hajj', 'muharram', 'other'])->default('other');
            $table->text('description')->nullable();
            $table->text('description_urdu')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('islamic_year_events');
    }
};
