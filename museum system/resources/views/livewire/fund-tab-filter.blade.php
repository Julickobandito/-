<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" style="color: #323461;" aria-selected="true" wire:model.debounce.1000ms="tab.main">Основний фонд</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                    type="button" role="tab" aria-controls="profile" style="color: #323461;" aria-selected="false" wire:model.debounce.1000ms="tab.additional">Допоміжний фонд</button>
        </li>
    </ul>
</div>
