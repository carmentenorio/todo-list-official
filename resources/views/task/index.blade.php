@extends('layouts.app')
@section('title', 'Task List')
@section('content')

    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="container mt-4">
        <a href="{{ route('task.create') }}" class="btn btn-success mb-3 btn-custom">
            New Task
        </a>
        <!--<thead>
            <tr>
                <th>Title</th>
                <th>Completed</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>-->

        <div class="tasks">
            @foreach ($tasks as $task)
                <div class="task border p-3 mb-3 bg-white rounded">

                    <form action="">
                        <input type="checkbox" {{ $task->completed ? 'checked' : '' }} >
                    </form>
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <h2 class="h5">{{ $task->title }}</h2>
                    <p class="mb-1 text-muted">{{ $task->created_at->format('d/m/Y H:i') }}</p>
                    <p>{{ $task->description }}</p>
                    <a href="{{ route('task.show', $task) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('task.edit', $task) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
                </form>
            </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
