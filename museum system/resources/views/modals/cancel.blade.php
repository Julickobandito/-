
<div class="modal fade cancelModal" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Зверніть увагу!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  wire:click="$dispatch('closeCancelModal', {})"></button>
            </div>
            <div class="modal-body">
                <p>Після скасування процесу реєстрації предмета, жодні дані не збережуться.</p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn-main" href="{{ url('cabinet/accountant') }}">Скасувати процес реєстрації</a>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('openCancelModal', function(event) {
        $('.cancelModal').modal('show');
    });
    window.addEventListener('closeCancelModal', function() {
        $('.cancelModal').modal('hide');
    });
</script>