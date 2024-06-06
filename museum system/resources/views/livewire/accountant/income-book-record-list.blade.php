<div class="wrapper">
    <div class="dict-header">
        <h1 class="title">{{ $varbook_type == '101' ? 'Основний' : 'Допоміжний' }} фонд. Том {{ $book_code }}</h1>
        <a type="button" class="btn-main" href="/cabinet/accountant/register-income">
            Створити новий запис
        </a>
    </div>

    <section class="datatable">
        <livewire:accountant.income-book-record-table />
    </section>

    @include('modals.book-record-info')

</div>
<script>
    window.addEventListener('openInfoBookRecordModal', function(event) {
        $('.infoBookRecord').find('p.data-info').html('');
        $('.infoBookRecord').modal('show');
    });
    window.addEventListener('closeInfoBookRecordModal', function() {
        $('.infoBookRecord').modal('hide');
    });
</script>
