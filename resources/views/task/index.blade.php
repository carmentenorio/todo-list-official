@extends('layouts.app')
@section('title', 'Task List')
@section('content')
  <div class="mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h4 mb-0">Task List</h1>
      <a href="{{ route('task.create') }}" class="btn btn-success btn-icon">
        <i class="fa-solid fa-circle-plus fa-fw"></i> New Task
      </a>
    </div>
    <div class="tasks">
      @foreach ($tasks as $task)
        <div class="card task shadow-sm mb-3">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start gap-3">
              <div class="flex-grow-1">
                <div class="d-flex align-items-center">
                  <form action="{{ route('task.update', $task->id) }}" method="POST" class="me-2">
                    @csrf
                    @method('PUT')
                    <input type="checkbox"
                           onChange="this.form.submit()"
                           {{ $task->completed ? 'checked' : '' }}>
                  </form>
                  <h2 class="h5 mb-0">{{ $task->title }}</h2>
                </div>
                <div class="text-muted small mt-1">
                  {{ $task->created_at->format('d/m/Y H:i') }}
                </div>
                @if($task->description)
                  <p class="mb-2 mt-2">{{ $task->description }}</p>
                @endif
                @if($task->category)
                  <span class="badge bg-info me-1">Categoría: {{ $task->category->name }}</span>
                @endif
                @if($task->tags && $task->tags->count())
                  <div class="mt-2">
                    @foreach($task->tags as $tag)
                      <span class="badge bg-secondary me-1">{{ $tag->name }}</span>
                    @endforeach
                  </div>
                @endif
              </div>
              <div class="d-flex flex-shrink-0 gap-2">
                <a href="{{ route('task.show', $task) }}" class="btn btn-primary btn-sm btn-icon" title="View">
                  <i class="fa-solid fa-eye fa-fw"></i> View
                </a>
                <a href="{{ route('task.edit', $task) }}" class="btn btn-secondary btn-sm btn-icon" title="Edit">
                  <i class="fa-solid fa-pen-to-square fa-fw"></i> Edit
                </a>
                <form id="delete-form-{{ $task->id }}" action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="button"
                          class="btn btn-danger btn-sm btn-icon-only"
                          data-bs-toggle="modal"
                          data-bs-target="#confirmDeleteModal"
                          data-form-id="delete-form-{{ $task->id }}"
                          aria-label="Eliminar">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  @push('modals')
    @include('partials.confirm-delete-modal', [
      'modalId' => 'confirmDeleteModal',
      'title' => 'Eliminar tarea',
      'message' => 'Esta acción no se puede deshacer. ¿Deseas eliminar la tarea?',
      'confirmLabel' => 'Eliminar'
    ])
  @endpush
@endsection
