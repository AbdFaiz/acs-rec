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
        Schema::create('psychotest_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psychotest_id')->constrained()->cascadeOnDelete();
            $table->text('question');
            $table->json('options')->nullable(); // for multiple choice
            $table->enum('type', ['essay', 'multiple_choice', 'true_false']);
            $table->string('correct_answer')->nullable();
            $table->integer('points')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psychotest_questions');
    }
};
