<?php

use Illuminate\Support\Facades\Route;

Route::get('/categories',[App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::post('/categories',[App\Http\Controllers\Api\CategoryController::class,'store']);
Route::get('/categories/{category}',[App\Http\Controllers\Api\CategoryController::class,'show']);
Route::put('/categories/{category}',[App\Http\Controllers\Api\CategoryController::class,'update']);
Route::delete('/categories/{category}',[App\Http\Controllers\Api\CategoryController::class,'destroy']);

Route::get('/tags',[App\Http\Controllers\Api\TagController::class, 'index']);
Route::post('/tags',[App\Http\Controllers\Api\TagController::class,'store']);
Route::get('/tags/{tag}',[App\Http\Controllers\Api\TagController::class,'show']);
Route::put('/tags/{tag}',[App\Http\Controllers\Api\TagController::class,'update']);
Route::delete('/tags/{tag}',[App\Http\Controllers\Api\TagController::class,'destroy']);

Route::get('/tasks',[App\Http\Controllers\Api\TaskController::class,'index']);
Route::post('/tasks', [App\Http\Controllers\Api\TaskController::class, 'store']);
Route::get('/tasks/{task}', [App\Http\Controllers\Api\TaskController::class, 'show']);
Route::put('/tasks/{task}',[App\Http\Controllers\Api\TaskController::class,'update']);
Route::delete('/tasks/{task}',[App\Http\Controllers\Api\TaskController::class,'destroy']);
//Route::apiResource('tasks', TaskController::class);

