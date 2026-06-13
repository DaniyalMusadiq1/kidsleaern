<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BadgeResource;
use App\Models\Badge;

class BadgeController extends Controller
{
    public function index()
    {
        $badges = Badge::active()->get();
        return BadgeResource::collection($badges);
    }
}
