<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_type_id',
        'module',
        'question_text',
        'correct_answer',
        'options',
        'image_path',
        'sound_path',
        'difficulty',
        'order',
        'is_active',
    ];

    protected $casts = [
        'options' => 'array',
        'is_active' => 'boolean',
    ];

    public function quizType(): BelongsTo
    {
        return $this->belongsTo(QuizType::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function scopeByModule($query, string $module)
    {
        return $query->where('module', $module);
    }
}
