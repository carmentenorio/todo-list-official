<?php

use App\Models\Category;
use App\Models\Task;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('task', TaskController::class);

Route::patch('task/{task}/toggle', function (Task $task) {
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->route('task.index');
})->name('task.toggle');

    
    Route::get('prueba', function () {
       $task = Task::find(1);
        if (!$task) {
        return 'No existe la tarea con ID 11';
    } 
         foreach($task->categories as $category){
              echo $category->name . '<br>';
         }
    });
    