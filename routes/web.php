<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('task', TaskController::class);
Route::resource('tag', TagController::class);
Route::resource('category', CategoryController::class);

