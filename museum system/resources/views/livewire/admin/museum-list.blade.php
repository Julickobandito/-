

<section class="wrapper">

    <livewire:list-top title="Облік музеїв" button="Зареєструвати музей"/>

    <section class="datatable">
        <livewire:admin.museum-table />
    </section>

    @include('modals.add-modal')
    @include('modals.edit-modal')
</div>

<script>
    window.addEventListener('openAddModal', function() {
        $('.addMuseum').find('span').html('');
        $('.addMuseum').find('form')[0].reset();
        $('.addMuseum').modal('show');
    });
    window.addEventListener('closeAddModal', function() {
        $('.addMuseum').find('span').html('');
        $('.addMuseum').find('form')[0].reset();
        $('.addMuseum').modal('hide');
    });
    window.addEventListener('openEditModal', function(event) {
        $('.editMuseum').modal('show');
    });
    window.addEventListener('closeEditModal', function() {
        $('.editMuseum').find('span').html('');
        $('.editMuseum').find('form')[0].reset();
        $('.editMuseum').modal('hide');
    });
</script>
