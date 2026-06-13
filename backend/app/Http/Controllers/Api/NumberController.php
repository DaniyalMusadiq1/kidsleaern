<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NumberResource;
use App\Models\Number;

class NumberController extends Controller
{
    public function index()
    {
        $numbers = Number::active()->get();
        return NumberResource::collection($numbers);
    }
}
