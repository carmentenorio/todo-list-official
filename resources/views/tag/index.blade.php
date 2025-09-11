@extends('layouts.app')
@section('title', 'Task List')
@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Tag List</h1>
    <a href="{{ route('tag.create') }}" class="btn btn-success btn-custom">
      <i class="fa-solid fa-plus me-1"></i> New Tag
    </a>
  </div>
  <div class="tags">
    @foreach ($tags as $tag)
      <div class="tag card shadow-sm mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div class="me-3">
              <h2 class="h5 d-inline ms-2">{{ $tag->name }}</h2>
            </div>
            <div class="d-flex gap-2">
              <a href="{{ route('tag.show', $tag) }}" class="btn btn-primary btn-sm btn-icon"><i class="fa-solid fa-eye fa-fw"></i></a>
              <a href="{{ route('tag.edit', $tag) }}" class="btn btn-secondary btn-sm btn-icon"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
              <form id="delete-form-{{ $tag->id }}" action="{{ route('tag.destroy', $tag->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button"
                        class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal"
                        data-form-id="delete-form-{{ $tag->id }}">
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
