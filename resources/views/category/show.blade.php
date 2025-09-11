@extends('layouts.app')
@section('title', 'Category Details')
@section('content')
<div class="container mt-4">
  <h1 class="h3 mb-3">Category Details</h1>
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-start mb-2">
        <h2 class="h5 mb-0">{{ $category->name }}</h2>
      </div>
      <div class="d-flex gap-2 mt-3">
        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Back to Categories</a>
      </div>
    </div>
  </div>
</div>
@endsection
