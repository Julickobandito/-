<div class="arrows row">

    @if ($currentStep != 1 )
    <div class="arrow-left col-lg-1">
        <button class="btn-tertiary" wire:click="decreaseStep()">Назад</button>
    </div>
    @endif

    <div class="arrow-right col-lg-10"> </div>

    @if ($currentStep < $totalStep)
    <div class="arrow-right col-lg-1">
        <button class="btn-tertiary" wire:click="increaseStep()">Вперед</button>
    </div>
    @endif

</div>
