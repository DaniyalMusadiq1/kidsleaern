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
            $table->string('letter', 1)->unique();
            $table->string('word');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('sound_path')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alphabets');
    }
};
