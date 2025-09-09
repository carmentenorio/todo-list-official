@extends('layouts.app')
@section('title', 'Task List')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('task.create') }}" class="btn btn-success mb-3 btn-custom">
            New Task
        </a>
        <div class="tasks">
            @foreach ($tasks as $task)
                <div class="task border p-3 mb-3 bg-white rounded">
                    <form action="{{ route('task.update', $task->id )}}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')

                        <input type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }} >
                    </form>

  <div class="tasks">
    @foreach ($tasks as $task)
      <div class="task card shadow-sm mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div class="me-3">
              <form action="{{ route('task.toggle', $task->id) }}" method="POST" class="d-inline">
                @csrf
                <input type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
              </form>

              <h2 class="h5 d-inline ms-2">{{ $task->title }}</h2>
              <p class="mb-1 text-muted small">{{ $task->created_at->format('d/m/Y H:i') }}</p>
              <p class="mb-0">{{ $task->description }}</p>
            </div>
             {{-- Mostrar categoría --}}
          @if($task->category)
            <span class="badge bg-info">Categoría: {{ $task->category->name }}</span>
          @endif

          {{-- Mostrar tags --}}

          @if($task->tags)
            <div class="mt-2">
              @foreach($task->tags as $tag)
                <span class="badge bg-secondary">{{ $tag->name }}</span>
              @endforeach
            </div>
          @endif

            <div class="d-flex gap-2">
              <a href="{{ route('task.show', $task) }}" class="btn btn-primary btn-sm btn-icon"><i class="fa-solid fa-eye fa-fw"></i></a>
              <a href="{{ route('task.edit', $task) }}" class="btn btn-secondary btn-sm btn-icon"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>

              {{-- ELIMINAR: mismo form; botón abre modal --}}
              <form id="delete-form-{{ $task->id }}" action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button"
                        class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal"
                        data-form-id="delete-form-{{ $task->id }}">
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
  {{-- Modal global de confirmación --}}
  @include('partials.confirm-delete-modal', [
    'modalId' => 'confirmDeleteModal',
    'title' => 'Eliminar tarea',
    'message' => 'Esta acción no se puede deshacer. ¿Deseas eliminar la tarea?',
    'confirmLabel' => 'Eliminar'
  ])
@endpush
@endsection
