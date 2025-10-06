<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




//authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//protected routes
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class,  'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});

//example
Route::middleware('role:user')->group(function () {
    Route::get('/user/dashboard', function () {
        return response()->json(['message' => 'Welcome to user dashboard!']);
    });
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
