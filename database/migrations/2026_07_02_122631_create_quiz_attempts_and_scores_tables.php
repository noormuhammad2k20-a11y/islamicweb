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
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('quiz_id')->constrained('islamic_quizzes')->cascadeOnDelete();
            $table->string('selected_option');
            $table->boolean('is_correct');
            $table->integer('time_taken_seconds')->nullable();
            $table->timestamps();
        });

        Schema::create('user_quiz_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('quiz_category_id')->nullable()->constrained('quiz_categories')->cascadeOnDelete();
            $table->integer('total_score')->default(0);
            $table->integer('quizzes_taken')->default(0);
            $table->decimal('accuracy_percentage', 5, 2)->default(0);
            $table->timestamp('last_attempt_at')->nullable();
            $table->timestamps();
        });

        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('quiz_category_id')->nullable()->constrained('quiz_categories')->cascadeOnDelete();
            $table->enum('period', ['daily', 'weekly', 'all_time']);
            $table->integer('score');
            $table->integer('rank')->nullable();
            $table->timestamps();
        });

        Schema::create('daily_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('islamic_quizzes')->cascadeOnDelete();
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('weekly_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('islamic_quizzes')->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_quizzes');
        Schema::dropIfExists('daily_quizzes');
        Schema::dropIfExists('leaderboards');
        Schema::dropIfExists('user_quiz_scores');
        Schema::dropIfExists('quiz_attempts');
    }
};
