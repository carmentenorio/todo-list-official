@extends('layouts.app')
@section('title', 'Edit Tag')

@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Edit Tag</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('tag.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Name of the tag</label>

          <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            value="{{ old('name', $tag->name) }}"
            required
          >
        </div>

        <div class="d-flex justify-content-end gap-2">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('tag.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
