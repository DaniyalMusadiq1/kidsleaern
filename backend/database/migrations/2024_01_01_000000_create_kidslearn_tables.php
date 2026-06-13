<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alphabets', function (Blueprint $table) {
            $table->id();
            $table->string('letter', 1);
            $table->string('word');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('sound_path')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('word_spelling');
            $table->string('image_path')->nullable();
            $table->string('sound_path')->nullable();
            $table->string('range_group')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('word_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_path')->nullable();
            $table->string('color_hex', 7)->default('#FF6B6B');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('word_categories')->onDelete('cascade');
            $table->string('word');
            $table->text('sentence')->nullable();
            $table->string('image_path')->nullable();
            $table->string('sound_path')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('quiz_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

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

        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('condition_type');
            $table->json('condition_value');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value');
            $table->string('group')->default('general');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('media_library', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type');
            $table->string('mime_type');
            $table->integer('size');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_library');
        Schema::dropIfExists('app_settings');
        Schema::dropIfExists('badges');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('quiz_types');
        Schema::dropIfExists('words');
        Schema::dropIfExists('word_categories');
        Schema::dropIfExists('numbers');
        Schema::dropIfExists('alphabets');
    }
};
