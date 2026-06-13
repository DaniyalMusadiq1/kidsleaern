<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
    public function byModule($module)
    {
        $questions = Question::where('module', $module)
            ->active()
            ->orderBy('difficulty')
            ->get();
        return QuestionResource::collection($questions);
    }
}
