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

    
/*Route::get('prueba', function(){
   
        $category = new Category();
        $category->name = 'Categoria 2';
        $category->save();
        return 'categoria 2';
    });*/

    /*Route::get('prueba2', function(){

        $task = new Task();
        $task->title = 'tarea3';
        $task->description = 'Descripcion3';
        $task->category_id = 2;
        $task->completed = true;
        $task->save();
        return 'tarea creada'; 
    
    });
    Route::get('prueba2', function(){
        $task= Task::find(1);
        return $task->category;
    });*/

    Route::get('prueba5', function(){
       $tag = new Tag();
        $tag->name = 'Urgente3';
        $tag->save();
        return 'etiqueta creada3';
    });

    //añadir etiquetas a las tareas
    Route::get('prueba6', function(){
        $task = Task::find(3);
        $task->tags()->attach([1,2,3]);
        return 'etiquetas asignadas';
    });
    //retornar las etiquetas de una tarea
    Route::get('prueba7', function(){
        $task = Task::find(10);
        return $task->tags;
    });

    // para retornar de manera inversa y retornar el posts de una categoria
    Route::get('prueba3', function(){
        $category= Category::find(1);
        return $category->tasks;
    });

    Route::get('prueba4', function(){
        $task = Task::find(13);
        return $task;
    });

    