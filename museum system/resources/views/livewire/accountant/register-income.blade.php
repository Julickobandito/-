<div class="wrapper">
    <div class="multistep-form">
        <h1 class="title">Реєстрація предмета в книгах обліку</h1>
        <div id="form_income" wire:submit.prevent="save">

        @include('steps-indicator')

        <input type="hidden" wire:model="user_id" />

        {{-- PAGE 1 --}}

        @if ($currentStep == 1)

        <div class="step-one">

            <div class="form register-form" >

                @include('arrows')

                <div class="mb-3 what-book row">
                    <div class="col-lg-11"> </div>
                    <div class="col-lg-1">1/3</div>
                </div>

                <p>Укажіть інформацію про акт приймання-передавання музейних предметів на постійне/тимчасове зберігання.</p>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="act_num" class="form-label">Номер акту № <span class="mandatory">(обов'язково)</span></label>
                        <input type="hidden" value="act" wire:model="docs.0.type">
                        <input type="text" class="form-control" id="act_doc_num" name="act_doc_num" placeholder="Укажіть номер акту" wire:model="main_docs.act.num">
                        <span class="text-danger"> @error('main_docs.act.num') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="act_date" class="form-label">Дата підписання <span class="mandatory">(обов'язково)</span></label>
                        <input id="act_date" class="form-control form-date" type="date" name="act_doc_date" placeholder="" wire:model="main_docs.act.date" />
                        <span class="text-danger"> @error('main_docs.act.date') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="protocol_num" class="form-label">Номер протоколу № <span class="mandatory">(обов'язково)</span></label>
                        <input type="hidden" value="proto" wire:model="docs.1.type">
                        <input type="text" class="form-control" id="protocol_num" name="proto_doc_num" placeholder="Укажіть номер протоколу" wire:model="main_docs.proto.num" />
                        <span class="text-danger"> @error('main_docs.proto.num') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="protocol_date" class="form-label">Дата підписання <span class="mandatory">(обов'язково)</span></label>
                        <input id="protocol_date" class="form-control form-date" type="date" placeholder="" wire:model="main_docs.proto.date" />
                        <span class="text-danger"> @error('main_docs.proto.date') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mb-3 check check-book">
                    <p>Оберіть книгу для запису:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="varbook_code" id="main" value="101" checked 
                            wire:change="setVarbookType('main')" />
                        <label class="form-check-label" for="main">
                            Книга основного фонду
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="varbook_code" id="additional" value="102" 
                            wire:change="setVarbookType('additional')" />
                        <label class="form-check-label" for="additional">
                            Книга допоміжного фонду
                        </label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <p>Наразі відкритим є том <strong>“{{ $book_code }}”</strong> книги основного фонду.</p>
                    <div class="d-flex justify-content-start">
                        <p>Якщо бажаєте відкрити новий том, <span>&#8203;</span></p>
                        <a href="/income_list" class="link-form" id="to_income_book"> перейдіть до списку томів книги надходжень</a>
                    </div>
                </div>
                @include('action-buttons-'.$book_type)
            </div>

        </div>

        @endif

        {{-- PAGE 2 --}}

        @if ($varbook_type == 'main')

            @if ($currentStep == 2)

        <div class="step-two">

            <div class="form register-form">

                @include('arrows')

                <div class="mb-3 what-book row">
                    <div class="col-lg-11">Том "{{ $book_code }}" книги надходжень основного фонду</div><div class="col-lg-1">2/3</div>
                </div>

                <p>Уведіть інформацію про предмет до книги надходжень основного фонду.</p>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="account_num" class="form-label">Обліковий номер предмета <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="record_number" name="record_number" placeholder="Укажіть обліковий номер предмета" 
                            wire:model="record_number" />
                        <span class="text-danger"> @error('record_number') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="date_register" class="form-label">Дата реєстрації предмета <span class="mandatory">(обов'язково)</span></label>
                        <input type="date" class="form-control" id="record_registr" name="record_registr" placeholder="Уведіть дату реєстрації предмета" 
                            wire:model="record_registered" />
                        <span class="text-danger"> @error('record_registered') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Назва <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="obj_name" name="obj_name" placeholder="Укажіть назву предмета" wire:model="obj_name">
                        <span class="text-danger"> @error('obj_name') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="author" class="form-label">Автор</label>
                        <input type="text" class="form-control" id="author" placeholder="Укажіть автора" wire:model="author" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Стислий опис</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Уведіть опис предмета" wire:model="description" /></textarea>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="count_num" class="form-label">Кількість одиниць зберігання</label>
                        <input type="number" class="form-control" id="count_num" placeholder="Укажіть кількість" min="1" value="1" wire:model="amount" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sizes" class="form-label">Розміри (см/мм)</label>
                    <input type="text" class="form-control" id="sizes" placeholder="Укажіть розміри предмета" wire:model="sizes" />
                </div>
                <div class="mb-3">
                    <label for="materials" class="form-label">Матеріали</label>
                    <input type="text" class="form-control" id="materials" placeholder="Укажіть матеріали" wire:model="materials" />
                </div>
                <div class="mb-3">
                    <p>Чи наявні дорогоцінне каміння або дорогоцінні метали?</p>
                    <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="metals" id="metals" wire:model="have_metals" {{ $have_metals ? 'checked' : '' }} />
                        <label for="metals">Так, наявні дорогоцінні метали</label>
                    </div>
                    <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="jewelry" id="jewelry" wire:model="have_jewelry" {{ $have_jewelry ? 'checked' : '' }} />
                        <label for="jewelry">Так, наявне дорогоцінне каміння</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="technique" class="form-label">Техніка виготовлення</label>
                    <input type="text" class="form-control" id="technique" placeholder="Укажіть техніку виготовлення предмета" wire:model="technique" />
                </div>
                <div class="mb-3">
                    <label for="creation" class="form-label">Час та місце створення</label>
                    <textarea class="form-control" id="creation" rows="3" placeholder="Уведіть час та місце створення" wire:model="creation"></textarea>
                </div>
                <div class="mb-3">
                    <label for="residence" class="form-label">Час та місце побутування</label>
                    <textarea class="form-control" id="residence" rostorage_groupsws="3" placeholder="Уведіть час та місце побутування" wire:model="residence"></textarea>
                </div>
                <div class="mb-3">
                    <label for="discovery" class="form-label">Час та місце виявлення</label>
                    <textarea class="form-control" id="discovery" rows="3" placeholder="Уведіть час та місце виявлення" wire:model="discovery"></textarea>
                </div>

                @include('action-buttons-'.$book_type)

            </div>

        </div>

        @endif

        {{-- PAGE 3 --}} 

        @if ($currentStep == 3)
        <div class="step-two">

            <div class="form register-form">

                @include('arrows')

                <div class="mb-3 what-book row">
                    <div class="col-lg-11">Том "{{ $book_code }}" книги надходжень основного фонду</div><div class="col-lg-1">3/3</div>
                </div>

                <div class="mb-3">
                    <label for="condition" class="form-label">Стан збереження</label>
                    <select class="form-select" id="condition" aria-label="Стан збереження" wire:model="condition" />
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($condition_types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="source_income" class="form-label">Джерело надходження</label>
                    <textarea class="form-control" id="source_income" rows="3" placeholder="Уведіть джерело надходження" wire:model="source_income"></textarea>
                </div>
                <div class="mb-3">
                    <label for="receipt_method" class="form-label">Спосіб надходження</label>
                    <select class="form-select" id="receipt_method" aria-label="Спосіб надходження" wire:model="income_method">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($income_method_types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="evaluation_price" class="form-label">Оціночна вартість, грн.</label>
                    <input type="text" class="form-control" id="evaluation_price" placeholder="Укажіть оціночну вартість предмета" wire:model="evaluation_price" />
                </div>
                <div class="mb-3">
                    <label for="insurance_price" class="form-label">Страхова вартість, грн.</label>
                    <input type="text" class="form-control" id="insurance_price" placeholder="Укажіть страхову вартість предмета" wire:model="insurance_price" />
                </div>
                <p class="marking">Інші документи</p>
                <div class="docs" id="docs">

                    @for ($i = 0; $i < $document_count; $i++)
                    @include('document', ['doc_idx' => $i])
                    @endfor

                    <div class="d-flex justify-content-start">
                        <button class="btn-tertiary btn-add" type="button" wire:click="addDocument">+ Додати документ</button>
                        <button class="btn-tertiary btn-remove" type="button" wire:click="removeDocument">- Прибрати документ</button>
                    </div>
                </div>
                
                @include('action-buttons-'.$book_type)

            </div>

        </div>

            @endif

        @endif

        @if ($varbook_type == 'additional' && $currentStep == 2)

        <div class="container-fluid">
            <h2>КНИГА НАДХОДЖЕННЯ ДОПОМІЖНОГО ФОНДУ</h2>
            <div class="form register-form">

                @include('arrows')

                <p>Уведіть інформацію про предмет до книги надходжень основного фонду.</p>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="account_num" class="form-label">Обліковий номер предмета <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" name="text" placeholder="Укажіть номер акту" wire:model="record_number">
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="date_register" class="form-label">Дата реєстрації предмета <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control form-date" type="date" placeholder="Уведіть дату" wire:model="date_registered"/>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Назва <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" name="text" placeholder="Укажіть назву предмета" wire:model="obj_name"/>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="author" class="form-label">Автор</label>
                        <input type="text" class="form-control" id="author" placeholder="Укажіть автора" wire:model="author"/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Стислий опис</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Уведіть опис предмета" wire:model="description"></textarea>
                </div>
                <div class="mb-3">
                    <div class="col-md-5">
                        <label for="count_num" class="form-label">Кількість одиниць зберігання</label>
                        <input type="number" class="form-control" id="count_num" placeholder="Укажіть кількість" min="1" wire:model="amount" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="condition" class="form-label">Стан збереження</label>
                    <select class="form-select" id="condition" aria-label="Стан збереження" wire:model="condition">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($condition_types as $key=>$type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="source_income" class="form-label">Джерело надходження</label>
                    <textarea class="form-control" id="source_income" rows="3" placeholder="Уведіть джерело надходження" wire:model="source_income"></textarea>
                </div>
                <div class="mb-3">
                    <label for="receipt_method" class="form-label">Спосіб надходження</label>
                    <select class="form-select" id="receipt_method" aria-label="Спосіб надходження" wire:model="income_method">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($income_method_types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="evaluation_price" class="form-label">Оціночна вартість</label>
                    <input type="text" class="form-control" id="evaluation_price" placeholder="Укажіть оціночну вартість предмета" wire:model="evaluation_price"/>
                </div>
                <div class="mb-3">
                    <label for="insurance_price" class="form-label">Страхова вартість</label>
                    <input type="text" class="form-control" id="insurance_price" placeholder="Укажіть страхову вартість предмета" wire:model="insurance_price"/>
                </div>
                <p class="marking">Інші документи</p>
                <div class="docs" id="docs">

                    @for ($i = 0; $i < $document_count; $i++)
                    @include('document', ['doc_idx' => $i, 'is_disabled' => $item['is_disabled']??''])
                    @endfor

                </div>
                <div class="d-flex justify-content-start">
                    <button class="btn-tertiary btn-add" type="button" id="btn-add-3" wire:click="addDocument">+ Додати документ</button>
                    <button class="btn-tertiary btn-remove" type="button" id="btn-remove-3" wire:click="removeDocument">- Прибрати документ</button>
                </div>

                @include('action-buttons')

            </div>
        </div>

        @endif

        @include('modals.cancel')
        @include('modals.save-draft')
        @include('modals.save-complete')

    </div>
    </div>
</div>