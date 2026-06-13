<?php

use App\Http\Controllers\Api\AlphabetController;
use App\Http\Controllers\Api\AppSettingController;
use App\Http\Controllers\Api\BadgeController;
use App\Http\Controllers\Api\NumberController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\WordCategoryController;
use App\Http\Controllers\Api\WordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes for KidsLearn Mobile App
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    // App Settings - Theme, colors, logo, maintenance mode, version
    Route::get('/app-settings', [AppSettingController::class, 'index']);
    
    // Content Version - For smart caching strategy
    Route::get('/content-version', function () {
        $version = md5(now()->format('Y-m-d H:i'));
        return response()->json(['version' => $version, 'timestamp' => now()]);
    });
    
    // Alphabets
    Route::get('/alphabets', [AlphabetController::class, 'index']);
    
    // Numbers
    Route::get('/numbers', [NumberController::class, 'index']);
    
    // Word Categories
    Route::get('/word-categories', [WordCategoryController::class, 'index']);
    
    // Words by Category
    Route::get('/words/{categoryId}', [WordController::class, 'byCategory']);
    
    // Questions by Module (alphabet, number, word)
    Route::get('/questions/{module}', [QuestionController::class, 'byModule']);
    
    // Badges
    Route::get('/badges', [BadgeController::class, 'index']);
});
