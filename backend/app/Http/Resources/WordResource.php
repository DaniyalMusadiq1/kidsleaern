<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'word' => $this->word,
            'sentence' => $this->sentence,
            'image_url' => $this->image_path ? url('storage/' . $this->image_path) : null,
            'sound_url' => $this->sound_path ? url('storage/' . $this->sound_path) : null,
            'order' => $this->order,
            'is_active' => $this->is_active,
            'category' => new WordCategoryResource($this->whenLoaded('category')),
        ];
    }
}
