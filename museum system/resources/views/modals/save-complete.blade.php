
<div class="modal fade saveCompleteModal" id="complete_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Зверніть увагу!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="$dispatch('closeSaveCompleteModal', {})"></button>
            </div>
            <div class="modal-body">
                <p>Після натискання на кнопку “Зберегти”, уся інформація буде збережена в книгу надходжень, після чого запис <strong>не можна буде редагувати</strong>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-tertiary" data-bs-dismiss="modal" wire:click="$dispatch('closeSaveCompleteModal', {})">Скасувати</button>
                <button type="button" class="btn-main" wire:click="save_complete()">Зберегти</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('openSaveCompleteModal', function(event) {
        $('.saveCompleteModal').modal('show');
    });
    window.addEventListener('closeSaveCompleteModal', function() {
        $('.saveCompleteModal').modal('hide');
    });
</script>
