<x-layout>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="container mt-4">
        <a href="{{ route('task.create') }}">
            New Task
        </a>
        <div class="tasks">
            @foreach ($tasks as $task)
                <div class="task border p-3 mb-3 bg-white rounded">
                    <h2 class="h5">{{ $task->title }}</h2>
                    <p class="mb-1 text-muted">{{ $task->created_at->format('d/m/Y H:i') }}</p>
                    <p>{{ $task->description }}</p>
                    <a href="{{ route('task.show', $task) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('task.edit', $task) }}" class="btn btn-secondary btn-sm">Edit</a>
                </div>
            @endforeach
            {{ $tasks->links() }}
        </div>
    </div>
</x-layout>
