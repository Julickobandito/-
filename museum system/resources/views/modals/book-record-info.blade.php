<div class="modal fade infoBookRecord" wire:ignore.self id="bookInfo" tabindex="-1" aria-labelledby="infoBookRecord">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Довідка про том</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="md-3 form form-additional">

                    <div class="d-flex">
                        <p class="p-bold column-1">Номер акту:</p>
                        <p class="column-2">№{{ $act_doc_num }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Дата підписання акту:</p>
                        <p class="column-2">{{ $act_doc_date }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Номер протоколу:</p>
                        <p class="column-2">№{{ $proto_doc_num }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Дата підписання протоколу:</p>
                        <p class="column-2">{{ $proto_doc_date }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Обліковий номер предмета:</p>
                        <p class="column-2">№{{ $record_number }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Том:</p>
                        <p class="column-2">{{ $book_code }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Назва:</p>
                        <p class="column-2">{{ $obj_name }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Автор:</p>
                        <p class="column-2">{{ $descr_author }}</p>
                    </div>

                    <div class="d-flex">
                        <p class="p-bold column-1">Стислий опис:</p>
                        <p class="column-2">{{ $descr_description }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Кількість одиниць:</p>
                        <p class="column-2">{{ $descr_amount }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Розміри (см/мм)</p>
                        <p class="column-2">{{ $descr_sizes }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Матеріали</p>
                        <p class="column-2">{{ $descr_materials }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Стан збереженості:</p>
                        <p class="column-2">{{ $descr_condition }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Інформація щодо реставрації:</p>
                        <p class="column-2">{{ $descr_restoration }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Джерело надходження:</p>
                        <p class="column-2">{{ $descr_source }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Спосіб надходження:</p>
                        <p class="column-2">{{ $descr_income_method }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Оціночна вартість:</p>
                        <p class="column-2">{{ $descr_estimated_value }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Страхова вартість:</p>
                        <p class="column-2">{{ $descr_insurance_value }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Час та місце створення:</p>
                        <p class="column-2">{{ $descr_about_creation }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Час та місце побутування:</p>
                        <p class="column-2">{{ $descr_about_residence }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Час та місце виявлення:</p>
                        <p class="column-2">{{ $descr_about_discovery }}</p>
                    </div>
                    @if($descr_have_jewelry)
                    <div class="d-flex">
                        <p class="p-bold column-1">Чи наявні дорогоцінне каміння?</p>
                        <p class="column-2">Так</p>
                    </div>
                    @endif
                    @if($descr_have_metals)
                    <div class="d-flex">
                        <p class="p-bold column-1">Чи наявні дорогоцінні метали?</p>
                        <p class="column-2">Так</p>
                    </div>
                    @endif
                    <div class="d-flex">
                        <p class="p-bold column-1">Техніка виготовлення:</p>
                        <p class="column-2">{{ $descr_technique }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Обліковий номер за інвентарною книгою:</p>
                        <p class="column-2">№{{ $inv_record_num }}</p>
                    </div>
                    @if($spc_record_num)
                    <div class="d-flex">
                        <p class="p-bold column-1">Обліковий номер за спеціальною інвентарною книгою:</p>
                        <p class="column-2">№{{ $spc_record_num }}</p>
                    </div>
                    @endif
                    <div class="d-flex">
                        <p class="p-bold column-1">Місцезнаходження:</p>
                        <p class="column-2">
                            @foreach($movements as $idx=>$item)
                            {{ count($movements) > 1 ? ($idx+1).')':'' }} {{ $item['location_name'] }}. {{ $item['date'] }}. {{ $item['description'] }}. <br>
                            @endforeach
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="p-bold column-1">Інші документи:</p>
                        <p class="column-2"></p>
                        @foreach($docs as $idx=>$item)
                        {{ count($docs) > 1 ? ($idx+1).')':'' }} {{ $item['type_name'] }}. {{ $item['date'] }}. №{{ $item['num'] }}. <br>
                        @endforeach
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
