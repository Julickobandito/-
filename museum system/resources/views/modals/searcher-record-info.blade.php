<div class="modal fade infoSearcherRecord" wire:ignore.self id="infoSearcherRecord" tabindex="-1" aria-labelledby="infoSearcherRecord">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Довідка</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="md-3">
                    <h2>{{ $obj_name }}</h2>
                </div>
                <div class="md-3">
                    <div class="d-flex">
                        <p class="p-bold column-1">Обліковий номер в інвентарній книзі:</p>
                        <p class="column-2 data-info">№{{ $record_number }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Автор:</p>
                        <p class="column-2 data-info">{{ $descr_author }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Опис:</p>
                        <p class="column-2 data-info">{{ $descr_description }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Розмір:</p>
                        <p class="column-2 data-info">{{ $descr_sizes }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Матеріал:</p>
                        <p class="column-2 data-info">{{ $descr_materials }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Рух предмета:</p>
                        @foreach($movements as $idx=>$item)
                        <p class="column-2 data-info">{{ count($movements) > 1 ? ($idx+1).')':'' }} {{ $item['location_name'] }}. {{ $item['date'] }}. {{ $item['description'] }}.</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
