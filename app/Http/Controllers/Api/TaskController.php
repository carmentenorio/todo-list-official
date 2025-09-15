<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('category', 'tags')->latest()->get();
        return response()->json(['data' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags.*'      => 'integer|exists:tags,id',
            'tags'        => 'nullable|array',
            'completed'   => 'boolean',
        ]);
        $task              = new Task();
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->completed   = $request->has('completed');
        $task->category_id = $request->category_id;
        $task->save();
        $task->tags()->sync($validated['tags'] ?? []);
        return response()->json([
            'message' => 'Tarea creada con éxito',
            'data'    => $task->load('category', 'tags'),
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load(['category', 'tags']);
        return response()->json([
            'data' => $task,
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'completed'   => 'boolean',
        ]);
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->completed   = $request->has('completed');
        $task->category_id = $request->category_id;
        $task->tags()->sync($request->tags ?? []);
        $task->save();
        return response()->json([
            'message' => 'Tarea actualizada con éxito',
            'data'    => $task->load('category', 'tags'),
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'message' => 'Tarea eliminada',
        ]);
    }
}
