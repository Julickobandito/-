
<div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

@if ($currentStep == 1)
<div class="buttons row">
    <div class="col-md-6"> </div>
    <button class="btn-tertiary" type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" wire:click="$dispatch('openCancelModal', {})">Скасувати</button>
    @if($book_type == 'special')
    <button class="btn-sec" type="button" value="draft" wire:click="$dispatch('openSaveDraftModal', {})">Зберегти в чорнетку</button>
    @else
    <div class="col-md-2"> </div>
    @endif
    <button class="btn-tertiary" wire:click="increaseStep()">Вперед</button>
</div>
@endif

@if ($currentStep == 2)
<div class="buttons row">
    <button class="btn-tertiary" wire:click="decreaseStep()">Назад</button>
    @if($varbook_type == 'additional')
    <div class="col-md-3"> </div>
    @else
    <div class="col-md-4"> </div>
    @endif
    <button class="btn-tertiary" type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" wire:click="$dispatch('openCancelModal', {})">Скасувати</button>
    <button class="btn-sec" type="button" value="draft" wire:click="$dispatch('openSaveDraftModal', {})">Зберегти в чорнетку</button>
    @if ($currentStep == $totalStep || $varbook_type == 'additional')
    <button class="btn-main" type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" wire:click="$dispatch('openSaveCompleteModal', {})">Зберегти</button>
    @endif
    @if ($currentStep < $totalStep)
    <button class="btn-tertiary" wire:click="increaseStep()">Вперед</button>
    @endif
</div>
@endif

@if ($currentStep == 3)
<div class="buttons row">
    <button class="btn-tertiary" wire:click="decreaseStep()">Назад</button>
    <div class="col-lg-4"> </div>
    <button class="btn-tertiary" type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" wire:click="$dispatch('openCancelModal', {})">Скасувати</button>
    <button class="btn-sec" type="button" wire:click="$dispatch('openSaveDraftModal', {})">Зберегти в чорнетку</button>
    <button class="btn-main" type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" wire:click="$dispatch('openSaveCompleteModal', {})">Зберегти</button>
    @if ($currentStep < $totalStep)
    <button class="btn-tertiary" wire:click="increaseStep()">Вперед</button>
    @endif
</div>
@endif

</div>
