<div class="modal fade editBook" wire:ignore.self id="editBook" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редагувати том</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">
                    <input type="hidden" wire:model="b_id"/>
                    <div class="md-3" style="margin-bottom: 12px;">
                        <label for="tom_name" class="form-label">Назва тому</label>
                        <input type="text" class="form-control" id="book_code" name="text" placeholder="Уведіть назву тому" wire:model="upd_book_code" >
                    </div>
                    <div class="mb-3">
                        <label for="tom_description" class="form-label">Опис</label>
                        <textarea class="form-control" id="book_description" rows="4" placeholder="Уведіть опис тому" wire:model="upd_book_description"></textarea>
                    </div>
                    <div class="mb-3" style="margin-bottom: 12px;">
                        <label for="tom_type" class="form-label">Статус</label>
                        <select class="form-select" id="tom_type" aria-label="book_type" wire:model="upd_book_current">
                            <option value="true">Відкритий</option>
                            <option value="false">Завершений</option>
                        </select>
                    </div>
                    <div class="warning" style="display: none;">
                        <img src="/img/warning.svg" alt="info">
                        <p>Після закриття тому ви не зможете більше вносити туди записи.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="submit" class="btn-main">Редагувати</button>
                </div>
            </form>
        </div>
    </div>
</div>
