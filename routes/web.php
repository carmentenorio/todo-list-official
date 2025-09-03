<?php

use App\Models\Category;
use App\Models\Task;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('prueba', function () {
    Category::create([
        'name' => 'categoria 2',
        'task_id' => 1
    ]);
    return 'Categoria creada 2';

    $task = Task::find(1);
    return $task;
});*/

/**recupera varios categorias
    Route::get('prueba', function () {
        $task = Task::find(1);
        return $task->categories; //devuelve todas las categorias de la tarea 1
    });*/
    Route::resource('task', TaskController::class);

    
    
    
