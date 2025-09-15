<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'tags')->latest()->get();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::latest('name')->get();
        $tags       = Tag::latest('name')->get();
        return view('task.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags.*'      => 'integer|exists:tags,id',
            'tags'        => 'nullable|array',
            'completed'   => 'boolean',
        ]);

        $task              = new Task();
        $task->title       = $validated['title'];
        $task->description = $validated['description'] ?? null;
        $task->completed   = $request->has('completed');
        $task->category_id = $validated['category_id'] ?? null;
        $task->save();

        $task->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('task.index')
            ->with('success', 'Tarea creada con éxito');
    }

    public function show(Task $task)
    {
        $task->load(['category', 'tags']);
        return view('task.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        $tags       = Tag::all();
        $task->load(['category', 'tags']);
        return view('task.edit', compact('task', 'categories', 'tags'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'completed'   => 'boolean',
        ]);

        $task->title       = $validated['title'];
        $task->description = $validated['description'] ?? null;
        $task->completed   = $request->has('completed');
        $task->category_id = $validated['category_id'] ?? null;
        $task->save();

        $task->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('task.index')
            ->with('success', 'Tarea actualizada con éxito');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')
            ->with('success', 'Task removed 🗑️');
    }
}