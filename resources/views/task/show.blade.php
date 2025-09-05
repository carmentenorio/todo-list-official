<x-layout>
   <div class="container mt-4">
            <h1>Task Details</h1>
            <p>Here you can see the details of the task.</p>
        </div>
        <div class="container mt-4">
            <a href="{{ route('task.index') }}">
                Back to Tasks
            </a>
            <div class="task border p-3 mb-3 bg-white rounded">
                <h2 class="h5">{{ $task->title }}</h2>
                <p class="mb-1 text-muted">{{ $task->created_at->format('d/m/Y H:i') }}</p>
                <p>{{ $task->description }}</p>
                <a href="{{ route('task.edit', $task) }}" class="btn btn-secondary btn-sm">Edit</a>
            </div>
        </div>
</x-layout>

