@extends('layouts.app')
@section('title', 'Categories List')

@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Category List</h1>
    <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-start mb-2">
        <h2 class="h5 mb-0">{{ $category->name }}</h2>
      </div>
      <div class="d-flex gap-2 mt-3">
        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Back to Categories</a>
        <a href="{{ route('category.edit', $category) }}" class="btn btn-primary">Edit</a>
      </div>
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
