@extends('layouts.app')
@section('title', 'Categories List')
@section('content')
    <div class="container mt-4">
        <a href="{{ route('category.create') }}" class="btn btn-success mb-3 btn-custom">
            New Task
        </a>
        <div class="categories">
            @foreach ($tasks as $task)
                <div class="category border p-3 mb-3 bg-white rounded">
                    <form action="">
                        <input type="checkbox" {{ $task->completed ? 'checked' : '' }} >
                    </form>
                    <form action="{{ route('category.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <h2 class="h5">{{ $task->title }}</h2>
                    <p class="mb-1 text-muted">{{ $task->created_at->format('d/m/Y H:i') }}</p>
                    <p>{{ $task->description }}</p>
                    <a href="{{ route('category.show', $task) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('category.edit', $task) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
                </form>
            </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
