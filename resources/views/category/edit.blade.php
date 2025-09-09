@extends('layouts.app')
@section('title', 'Edit Category')

@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Edit Category</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('category.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Name of the category</label>

          <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            value="{{ old('name', $category->name) }}"
            required
          >
        </div>

        </div>

        <div class="d-flex justify-content-end gap-2">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
