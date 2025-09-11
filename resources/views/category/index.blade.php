@extends('layouts.app')
@section('title', 'Category List')

@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Category List</h1>
    <a href="{{ route('category.create') }}" class="btn btn-success btn-custom">
      <i class="fa-solid fa-plus me-1"></i> New Category
    </a>
  </div>

  <div class="categories">
    @foreach ($categories as $category)
      <div class="task card shadow-sm mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div class="me-3">

              <h2 class="h5 d-inline ms-2">{{ $category->name }}</h2>
            </div>

            <div class="d-flex gap-2">
              <a href="{{ route('category.show', $category) }}" class="btn btn-primary btn-sm btn-icon"><i class="fa-solid fa-eye fa-fw"></i></a>
              <a href="{{ route('category.edit', $category) }}" class="btn btn-secondary btn-sm btn-icon"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>

              {{-- ELIMINAR: mismo form; botón abre modal --}}
              <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button"
                        class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal"
                        data-form-id="delete-form-{{ $category->id }}">
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
    'title' => 'Delete category',
    'message' => 'This action cannot be undone. Do you want to delete the category?',
    'confirmLabel' => 'Eliminate'
  ])
@endpush
@endsection

