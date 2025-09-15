<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/categories',[CategoryController::class, 'index']);
Route::post('/categories',[CategoryController::class,'store']);
Route::get('/categories/{category}',[CategoryController::class,'show']);
Route::put('/categories/{category}',[CategoryController::class,'update']);
Route::delete('/categories/{category}',[CategoryController::class,'destroy']);

Route::get('/tags',[TagController::class, 'index']);
Route::post('/tags',[TagController::class,'store']);
Route::get('/tags/{tag}',[TagController::class,'show']);
Route::put('/tags/{tag}',[TagController::class,'update']);
Route::delete('/tags/{tag}',[TagController::class,'destroy']);

Route::get('/tasks',[TaskController::class,'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{task}', [TaskController::class, 'show']);
Route::put('/tasks/{task}',[TaskController::class,'update']);
Route::delete('/tasks/{task}',[TaskController::class,'destroy']);
//Route::apiResource('tasks', TaskController::class);

