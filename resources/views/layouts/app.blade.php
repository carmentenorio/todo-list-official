<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'To-Do List')</title>

  {{-- CSS local (si lo usas) --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  {{-- Bootstrap 5 / FontAwesome --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    :root { --radius: 12px; }
    body { background-color: #f8f9fa; }
    .navbar { border-radius: 0 0 var(--radius) var(--radius); box-shadow: 0 4px 6px rgba(0,0,0,.08); }
    .btn, .card, .form-control, .alert { border-radius: var(--radius); }
    footer {
      margin-top: 48px; padding: 16px; text-align: center; background: #f1f1f1;
      border-radius: var(--radius) var(--radius) 0 0; font-size: .9rem; color: #555;
    }
    .nav-link.active, .nav-link.active:focus, .nav-link.active:hover { color: #fff !important; }
    
  </style>
  @stack('styles')
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('task.index') }}">
        <i class="fa-solid fa-list-check me-2"></i> TodoApp
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          @yield('navbar_left')
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('task.index') ? 'active' : '' }}" href="{{ route('task.index') }}">
              <i class="fa-solid fa-house me-1"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('task.create') ? 'active' : '' }}" href="{{ route('category.index') }}">
              <i class="fa-solid fa-plus-circle me-1"></i> Categories
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('task.create') ? 'active' : '' }}" href="{{ route('tag.index') }}">
              <i class="fa-solid fa-plus-circle me-1"></i> Tags
            </a>
          </li>

          </li>
          @yield('navbar_right')
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
   @include('partials.alerts', ['autoDismissMinutes' => 1])
    @hasSection('toolbar')
      <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between mb-3">
        @yield('toolbar')
      </div>
    @endif
    @yield('content')
  </div>

  @push('scripts')
<script>
  (function(mins = 1){
    if(!mins) return;
    document.querySelectorAll('.alert').forEach(function(el){
      setTimeout(() => {
        const inst = bootstrap.Alert.getOrCreateInstance(el);
        inst.close();
      }, mins * 60 * 1000);
    });
  })(1); 
</script>
@endpush
  <footer>
    <p class="mb-0">
      <i class="fa-regular fa-copyright"></i>
      {{ date('Y') }} - TodoApp
    </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')

  @stack('modals')
</body>
</html>
