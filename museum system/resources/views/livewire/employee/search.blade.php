<div class="wrapper">
    <div class="dict-header">
        <h1 class="title">Пошук</h1>
    </div>
    <div class="row mb-3" style="height: 50px; align-items: last baseline; margin: 0; padding: 10px 30px;">
        <div class="col-md-2" style="text-align: right">
            <label for="name" class="col-form-label text-md-end">Пошуковий критерій:</label>
        </div>

        <div class="col-md-5">
            <input id="name" type="text" class="form-control" wire:model="query" wire:change="changeQuery()" />
        </div>

        <div class="col-md-2">
            <button class="btn-sec" type="button" wire:click="search()">Пошук</button>
        </div>
    </div>

    @if(!$isQueryChanged)
    <section class="datatable" style="width: 80%; margin: 0 auto;">
        <livewire:employee.search-table :query="$query" /> <!--  -->
    </section>
    @endif

    @include('modals.searcher-record-info')

</div>

<script>
    window.addEventListener('openInfoSearcherRecordModal', function(event) {
        $('.infoSearcherRecord').find('p.column-2').html('');
        $('.infoSearcherRecord').modal('show');
    });
    window.addEventListener('closeInfoSearcherRecordModal', function() {
        $('.infoSearcherRecord').modal('hide');
    });
</script>
