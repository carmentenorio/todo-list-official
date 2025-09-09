<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
@extends('layouts.app')
@section('title', 'Create Tag')

@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Create New tag</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('tag.store') }}" method="POST" class="tag-form">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name of the Tag</label>
          <input type="text" name="name" id="name" placeholder="Enter tag name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="d-flex justify-content-end gap-2">
          <a href="{{ route('tag.index') }}" class="btn btn-outline-secondary">Cancel</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
