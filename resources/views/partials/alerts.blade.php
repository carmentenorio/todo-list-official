@php
  // Cambia los minutos desde cada vista con ['autoDismissMinutes' => N]
  $autoDismissMinutes = $autoDismissMinutes ?? 0; // 0 = no autocerrar
@endphp

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" data-auto-dismiss-min="{{ $autoDismissMinutes }}">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" data-auto-dismiss-min="{{ $autoDismissMinutes }}">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert" data-auto-dismiss-min="{{ $autoDismissMinutes }}">
    <strong>Revisa los errores:</strong>
    <ul class="mb-0 mt-2">
      @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@push('scripts')
<script>
  // Autocerrar alerts por minutos usando el atributo data-auto-dismiss-min
  document.querySelectorAll('.alert[data-auto-dismiss-min]').forEach(function(el){
    const mins = parseFloat(el.getAttribute('data-auto-dismiss-min')) || 0;
    if(mins > 0){
      setTimeout(() => {
        const inst = bootstrap.Alert.getOrCreateInstance(el);
        inst.close();
      }, mins * 60 * 1000);
    }
  });
</script>
@endpush
