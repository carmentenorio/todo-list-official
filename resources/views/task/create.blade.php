@extends('layouts.app')
@section('title', 'Create Task')
@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Create New Task</h1>
  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('task.store') }}" method="POST" class="task-form">
        @csrf
       <div class="form-check mb-3">
    <input type="hidden" name="completed" value="0">
    <input 
        class="form-check-input" 
        type="checkbox" 
        name="completed" 
        id="completed" 
        value="1"
        {{ old('completed', $task->completed ?? 0) == 1 ? 'checked' : '' }}
    >
    <label class="form-check-label" for="completed">Completed?</label>
</div>


        <div class="mb-3">
          <label for="title" class="form-label">Name of the task</label>
          <input type="text" name="title" id="title" placeholder="Enter task title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" id="description" placeholder="Enter task description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select name="category_id" id="category" class="form-select">
            <option value="">Select a category</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
           <label for="tag" class="form-label">Tag</label>
          <select name="tags[]" id="tag" class="form-select" multiple>
            @foreach($tags as $tag)
              <option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected':'' }}>
                {{ $tag->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="d-flex justify-content-end gap-2">
          <a href="{{ route('task.index') }}" class="btn btn-outline-secondary">Cancel</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
