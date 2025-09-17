<?php
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('categories', App\Http\Controllers\Api\CategoryController::class);
    Route::apiResource('tags', App\Http\Controllers\Api\TagController::class);
    Route::apiResource('tasks', App\Http\Controllers\Api\TaskController::class);
});
