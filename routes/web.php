<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('task', TaskController::class);
Route::resource('tag', App\Http\Controllers\TagController::class);
Route::resource('category', App\Http\Controllers\CategoryController::class);
