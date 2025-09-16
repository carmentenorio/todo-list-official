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
            'completed'   => 'required|in:0,1',
        ]);
        $task              = new Task();
        $task->title       = $validated['title'];
        $task->description = $validated['description'] ?? null;
        $task->completed   = $validated['completed'];
        $task->category_id = $validated['category_id'] ?? null;
        $task->save();

        $task->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('task.index')
            ->with('success', 'Task created successfully');
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
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'completed'   => 'nullable|in:0,1',
        ]);
        \Illuminate\Support\Facades\Log::info($request);
        if ($request->title) {$task->title = $validated['title'];}
        if ($request->description) {$task->description = $validated['description'] ?? null;}
        $task->completed = $validated['completed'] ?? $task->completed;

        if ($request->category_id) {
            $task->category_id = $validated['category_id'] ?? null;
        }

        $task->save();

        if ($request->has('tags')) {
            $task->tags()->sync($validated['tags'] ?? []);
        }
        return redirect()->route('task.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')
            ->with('success', 'Deleted task');
    }
}
