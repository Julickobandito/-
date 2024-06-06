
<div class="modal fade saveDraftModal" id="draft_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Зверніть увагу!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="$dispatch('closeSaveDraftModal', {})"></button>
            </div>
            <div class="modal-body">
                <p>Усі збережені чорнетки Ви можете переглянути на вкладці <strong>“Чорнетки обліку предметів”</strong>
                    у кабінеті обліковця.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-tertiary" data-bs-dismiss="modal" wire:click="$dispatch('closeSaveDraftModal', {})">Скасувати</button>
                <button type="button" class="btn-main" wire:click="save_draft()">Зберегти</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('openSaveDraftModal', function(event) {
        $('.saveDraftModal').modal('show');
    });
    window.addEventListener('closeSaveDraftModal', function() {
        $('.saveDraftModal').modal('hide');
    });
</script>
