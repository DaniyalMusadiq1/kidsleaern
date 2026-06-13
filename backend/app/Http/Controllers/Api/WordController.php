<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WordResource;
use App\Models\Word;

class WordController extends Controller
{
    public function byCategory($categoryId)
    {
        $words = Word::where('category_id', $categoryId)
            ->active()
            ->with('category')
            ->get();
        return WordResource::collection($words);
    }
}
