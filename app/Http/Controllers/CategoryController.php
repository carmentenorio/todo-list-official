<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {      
        $categories = Category::all(); 
        return view('category.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $task = new Category(); 
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        return redirect()->route('task.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $task)
    {
        return view('task.show', compact('task'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $task)
    {
        return view('task.edit', compact('task'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $task)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
       
        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = $request->has('completed'); 
        $task->save();
        return redirect()->route('task.index')->with('success', 'Tarea actualizada ✏️');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Category::findOrFail($id);
        $task->delete();
        return redirect()->route('task.index', ['task' => $task])
            ->with('success', 'Tarea eliminada 🗑️');
    }
}
