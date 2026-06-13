<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NumberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'word_spelling' => $this->word_spelling,
            'image_url' => $this->image_path ? url('storage/' . $this->image_path) : null,
            'sound_url' => $this->sound_path ? url('storage/' . $this->sound_path) : null,
            'range_group' => $this->range_group,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];
    }
}
