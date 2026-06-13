<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WordCategoryResource;
use App\Models\WordCategory;

class WordCategoryController extends Controller
{
    public function index()
    {
        $categories = WordCategory::active()->withCount('words')->get();
        return WordCategoryResource::collection($categories);
    }
}
