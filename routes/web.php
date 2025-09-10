<?php

use App\Models\Category;
use App\Models\Task;
use App\Models\Tag;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('task', TaskController::class);