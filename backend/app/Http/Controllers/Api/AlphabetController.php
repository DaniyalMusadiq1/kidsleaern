<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlphabetResource;
use App\Models\Alphabet;

class AlphabetController extends Controller
{
    public function index()
    {
        $alphabets = Alphabet::active()->get();
        return AlphabetResource::collection($alphabets);
    }
}
