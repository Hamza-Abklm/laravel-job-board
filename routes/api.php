<?php

use App\Http\Controllers\api\v1\AuthApiController;
use App\Http\Controllers\api\v1\PostApiController;



// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\TagController;
// use Illuminate\Support\Facades\Route;

// POST v1/auth/login
// POST v1/auth/refresh
// GET v1/auth/me
// POST v1/auth/logout

Route::prefix('v1')->group(function(){
    Route::apiResource('post',PostApiController::class)->middleware('auth:api');

    Route::prefix('auth')->group(function(){
        Route::post('login',[AuthApiController::class,'login']);
        // only if i am authenticated
        Route::middleware('auth:api')->group(function(){
            Route::post('refresh',[AuthApiController::class,'refresh']);
            Route::get('me',[AuthApiController::class,'me']);
            Route::post('logout',[AuthApiController::class,'logout']);

        });



    });

});



// eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3YxL2F1dGgvbG9naW4iLCJpYXQiOjE3NTQzOTIyMDgsImV4cCI6MTc1NDM5NTgwOCwibmJmIjoxNzU0MzkyMjA4LCJqdGkiOiJtTHphcUNUSDZGcGRtcGhVIiwic3ViIjoiNCIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.T0puvJYokGgpXnj_qHjfMSwRuDJGGnC3kdK78pAUMtI


