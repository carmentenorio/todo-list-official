<?php

use App\Http\Controllers\TaskController;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('task', TaskController::class);