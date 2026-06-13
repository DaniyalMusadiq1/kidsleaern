<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_type_id')->constrained('quiz_types')->onDelete('cascade');
            $table->enum('module', ['alphabet', 'number', 'word']);
            $table->text('question_text');
            $table->string('correct_answer');
            $table->json('options');
            $table->string('image_path')->nullable();
            $table->string('sound_path')->nullable();
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('easy');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
