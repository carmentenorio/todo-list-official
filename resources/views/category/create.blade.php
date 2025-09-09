@extends('layouts.app')
@section('title', 'Create Task')

@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Create New Category</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('category.store') }}" method="POST" class="category-form">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name of the category</label>
          <input type="text" name="name" id="name" placeholder="Enter category name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="d-flex justify-content-end gap-2">
          <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Cancel</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
