<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordCategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image_url' => $this->image_path ? url('storage/' . $this->image_path) : null,
            'color_hex' => $this->color_hex,
            'order' => $this->order,
            'is_active' => $this->is_active,
            'words_count' => $this->whenCounted('words'),
        ];
    }
}
