<div class="modal fade infoBook" wire:ignore.self id="bookInfo" tabindex="-1" aria-labelledby="bookInfo">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Довідка про том</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="md-3">
                    <div class="d-flex">
                        <p class="p-bold column-1">Назва тому:</p>
                        <p class="column-2 data-info">{{ $book_code }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Опис тому:</p>
                        <p class="column-2 data-info">{{ $book_description }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Облікові номери предметів:</p>
                        <p class="column-2 data-info">{{ $numbers }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Предметів обліковано:</p>
                        <p class="column-2 data-info">{{ $quantity }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Статус:</p>
                        <p class="column-2 data-info">{{ $book_current ? 'Активний' : 'Завершений' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
