<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$tasks = Task::whereNull('deleted_at')->get();

                              // O mejor, si tu modelo Task usa SoftDeletes, basta con:
        $tasks = Task::all(); // Laravel ya excluye las eliminadas por defecto
                              // a menos que hayas usado withTrashed()

        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');

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
        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //return view('task.edit', ['tasks' => $task]);
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title'       => $request->title,
            'completed'   => $request->has('completed'),
            'description' => $request->description,

        ]);

        return redirect()->route('task.index')->with('success', 'Tarea actualizada ✏️');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index', ['task' => $task])
            ->with('success', 'Tarea eliminada 🗑️');
    }
    public function restore($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        $task->restore();

        return redirect()->route('task.index')
            ->with('success', 'La tarea fue restaurado correctamente.');
    }
    public function forceDestroy($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        $task->forceDelete();

        return redirect()->route('task.index')
            ->with('success', 'La tarea  fue eliminado permanentemente.');
    }

}
