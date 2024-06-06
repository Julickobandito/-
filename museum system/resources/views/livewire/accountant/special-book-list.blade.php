@php($is_disabled = $isActiveBook ? 'disabled' : '')
<div class="wrapper">
    <div class="dict-header">
        <h1 class="title">Облік спеціальних інвентарних книг</h1>
        <button type="button" class="btn-main {{$is_disabled}}" data-bs-toggle="modal" data-bs-target="#addBook" 
            wire:click="$dispatch('openAddBookModal', {})" {{$is_disabled}}>
            Зареєструвати том
        </button>
    </div>

    <section class="datatable">
        <livewire:accountant.special-book-table :$parent/>
    </section>

    @include('modals.book-info')
    @include('modals.book-add')
    @include('modals.book-edit')

</div>
<script>
    window.addEventListener('openAddBookModal', function(event) {
        $('.addBook').find('form')[0].reset();
        $('.addBook').modal('show');
    });
    window.addEventListener('closeAddBookModal', function() {
        $('.addBook').modal('hide');
    });

    window.addEventListener('openEditBookModal', function(event) {
        $('.editBook').find('form')[0].reset();
        $('.editBook').modal('show');
    });
    window.addEventListener('closeEditBookModal', function() {
        $('.editBook').modal('hide');
    });

    window.addEventListener('openInfoBookModal', function(event) {
        $('.infoBook').find('p.data-info').html('');
        $('.infoBook').modal('show');
    });
    window.addEventListener('closeInfoBookModal', function() {
        $('.infoBook').modal('hide');
    });
</script>
