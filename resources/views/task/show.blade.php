<<<<<<< HEAD
@extends('layouts.app')
@section('title', 'Task Details')
@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Task Details</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-start mb-2">
        <h2 class="h5 mb-0">{{ $task->title }}</h2>
        <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning' }}">
          {{ $task->completed ? 'Completada' : 'Pendiente' }}
        </span>
      </div>

      <p class="mb-1 text-muted small">{{ $task->created_at->format('d/m/Y H:i') }}</p>
      <p>{{ $task->description }}</p>

      <div class="d-flex gap-2 mt-3">
        <a href="{{ route('task.index') }}" class="btn btn-outline-secondary">Back to Tasks</a>
        <a href="{{ route('task.edit', $task) }}" class="btn btn-primary">Edit</a>
      </div>
    </div>
  </div>
</div>
@endsection
