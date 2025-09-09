@extends('layouts.app')
@section('title', 'Edit Task')

@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Edit Task</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('task.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="title" class="form-label">Title of the task</label>

          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="completed" id="completed" value="1" {{ old('completed', $task->completed) ? 'checked' : '' }}>
            <label for="completed" class="form-check-label">Completed?</label>
          </div>

          <input
            type="text"
            name="title"
            id="title"
            class="form-control"
            value="{{ old('title', $task->title) }}"
            required
          >
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input
            type="text"
            name="description"
            id="description"
            class="form-control"
            value="{{ old('description', $task->description) }}"
          >
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select name="category_id" id="category" class="form-select" required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ (old('category_id', $task->category_id) == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>

           <label for="tag" class="form-label">Tag</label>
          <select name="tags[]" id="tag" class="form-select" multiple>
            @foreach($tags as $tag)
              <option value="{{ $tag->id }}" {{ (in_array($tag->id, old('tags', $task->tags->pluck('id')->toArray() ?? []))) ? 'selected':'' }}>
                {{ $tag->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="d-flex justify-content-end gap-2">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('task.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
