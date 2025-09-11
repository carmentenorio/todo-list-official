@props([
  'modalId' => 'confirmDeleteModal',
  'title' => 'Confirmar eliminación',
  'message' => 'Esta acción no se puede deshacer. ¿Deseas eliminar el registro?',
  'confirmLabel' => 'Eliminar'
])

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="{{ $modalId }}Label">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">{{ $message }}</div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="{{ $modalId }}ConfirmBtn">{{ $confirmLabel }}</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
(() => {
  const modalEl = document.getElementById('{{ $modalId }}');
  const confirmBtn = document.getElementById('{{ $modalId }}ConfirmBtn');
  let formToSubmit = null;

  modalEl.addEventListener('show.bs.modal', function (event) {
    const triggerBtn = event.relatedTarget;
    const formId = triggerBtn?.getAttribute('data-form-id');
    formToSubmit = formId ? document.getElementById(formId) : null;
  });

  confirmBtn.addEventListener('click', function(){
    if(formToSubmit){ formToSubmit.submit(); }
  });
})();
</script>
@endpush
