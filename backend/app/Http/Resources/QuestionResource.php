<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'quiz_type_id' => $this->quiz_type_id,
            'module' => $this->module,
            'question_text' => $this->question_text,
            'correct_answer' => $this->correct_answer,
            'options' => $this->options,
            'image_url' => $this->image_path ? url('storage/' . $this->image_path) : null,
            'sound_url' => $this->sound_path ? url('storage/' . $this->sound_path) : null,
            'difficulty' => $this->difficulty,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];
    }
}
