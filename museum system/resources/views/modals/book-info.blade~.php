<div class="modal fade" id="tomInfo" tabindex="-1" aria-labelledby="tomInfo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Довідка про том</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="md-3">
                    <div class="d-flex">
                        <p class="p-bold column-1">Назва тому</p>
                        <p class="column-2">Том 1.</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Опис тому</p>
                        <p class="column-2">{{ $description }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Облікові номери предметів:</p>
                        <p class="column-2">{{ $numbers }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Предметів обліковано:</p>
                        <p class="column-2">{{ $quantity }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
