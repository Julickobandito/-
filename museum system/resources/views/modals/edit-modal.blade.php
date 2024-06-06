<div class="modal fade editMuseum" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="museumModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редагувати музей</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="m_id"/>
                    <div class="form-group" style="margin-bottom:12px; ">
                        <label for="museum_name" class="form-label">Назва музею</label>
                        <input type="text" class="form-control" wire:model="upd_museum_name"
                            placeholder="Уведіть назву музею">
                        <span class="text-danger"> @error('upd_museum_name') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="museum_type" class="form-label">Тип музею</label>
                        <select class="form-select" aria-label="upd_museum_type" wire:model="upd_museum_type">
                            <option value="natural">Природничий музей</option>
                            <option value="historical">Історичний музей</option>
                            <option value="memorial">Меморіальний музей</option>
                            <option value="scientific">Науково-технічний музей</option>
                            <option value="artistic">Художній музей</option>
                            <option value="theater">Музей мистецького та театрального профілю</option>
                        </select>
                        <span class="text-danger"> @error('upd_museum_type') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group" style="margin-bottom:12px; ">
                        <label for="museum_code" class="form-label">Шифр музею</label>
                        <input type="text" class="form-control" wire:model="upd_museum_code"
                            placeholder="Уведіть шифр музею">
                        <span class="text-danger"> @error('upd_museum_code') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="museum_description" class="form-label">Опис</label>
                        <textarea class="form-control" rows="3" placeholder="Уведіть опис музею" wire:model="upd_museum_description"></textarea>
                        <span class="text-danger"> @error('upd_museum_description') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group" style="margin-bottom:12px; ">
                        <label for="museum_address" class="form-label">Адреса музею</label>
                        <input type="text" class="form-control" wire:model="upd_museum_address"
                            placeholder="Уведіть місцерозташування музею">
                        <span class="text-danger"> @error('upd_museum_address') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="museum_contacts" class="form-label">Контакти</label>
                        <textarea class="form-control" rows="3" wire:model="upd_museum_contacts"
                            placeholder="Уведіть контакти музею"></textarea>
                        <span class="text-danger"> @error('upd_museum_contacts') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Зберегти</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Скасувати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
