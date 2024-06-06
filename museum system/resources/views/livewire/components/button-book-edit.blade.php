<td class="last-td">
    <button type="button" class="btn-img" data-bs-toggle="modal" data-bs-target="#bookInfo" style="margin-right: 16px;" wire:click="$dispatch('openInfoBookModal', { id: {{$id}} })"><img src="/img/info.svg" alt="info"></button>
    <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editBook" wire:click="$dispatch('openEditBookModal', { id: {{$id}} })">Редагувати</button>
</td>
