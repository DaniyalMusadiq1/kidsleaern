<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AlphabetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'letter' => $this->letter,
            'word' => $this->word,
            'description' => $this->description,
            'image_url' => $this->image_path ? url('storage/' . $this->image_path) : null,
            'sound_url' => $this->sound_path ? url('storage/' . $this->sound_path) : null,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];
    }
}
