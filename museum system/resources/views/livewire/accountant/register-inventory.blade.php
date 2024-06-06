<div class="wrapper">
    <div class="multistep-form">
        <h1 class="title">Реєстрація предмета в книгах обліку</h1>
        <div id="form_income" wire:submit.prevent="save">

        @include('steps-indicator')

        <input type="hidden" wire:model="user_id" />

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        <div class="step-one">

            <div class="form register-form" >

                @include('arrows')

                <div class="mb-3 what-book row">
                    <div class="col-lg-11"> </div>
                    <div class="col-lg-1">1/3</div>
                </div>

                <p>Оберіть інвентарну книгу для запису:</p>

                <div class="mb-3">

                    <label for="save_group" class="form-label">Група зберігання</label>
                    <select class="form-select" id="save_group"  aria-label="multiple select" wire:model="varbook_code" wire:change="changeStorageGroups()">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($storage_groups as $item)
                        <option value="{{ $item->varbook_code }}">{{ $item->varbook_descr }}</option>
                        @endforeach()
                    </select>
                    <div class="text-danger"> @error('varbook_code') {{ $message }} @enderror</div>
                </div>

                <div class="d-flex justify-content-start">
                    <p>Немає необхідної групи? <span>&#8203;</span></p>
                    <a href="/storage_groups" class="link-form" id="to_inventory_book">Перейти до списку томів інвентарної книги</a>
                </div>

                <div class="mb-3 check-tom">
                    <p>Наразі відкритим є том “{{ $book_code ?? '-' }}” інвентарної книги “{{ $book_description ?? '-' }}”. 
                    {{--@if($book_code)
                    <br/>Том підходить?
                    @endif--}}
                </p>

                    <a href="/storage_group" class="link-form income" id="to_income_book">Перейти до списку томів інвентарної книги</a>
                </div>

                @include('action-buttons-'.$book_type)
            </div>

        </div>

        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)

        <div class="step-two">

            <div class="form register-form">

                @include('arrows')

                <div class="info-div">
                    <p class="register-info">Обліковий номер №{{ $act_doc_num }} у книзі надходження <i>{{ $fund == 'main' ? 'основного' : 'допоміжного' }}</i> фонду.</p>
                    <p class="register-info">Інвентарна книга “{{ $book_description }}”. Том “{{ $book_code }}”. </p>
                </div>
                <div class="info-div">
                    <p style="margin-bottom: 8px">Уведіть інформацію про предмет до інвентарної книги.</p>
                </div>
                <div class="info-div">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="checked" id="transferInfo" wire:change="changeTransferInfo()" {{ $transferInfoDisabled ? 'disabled' : '' }}>
                        <label for="transfer_info">Перенести інформацію з книги надходження</label>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="account_num" class="form-label">Інвентарний номер предмета <span class="mandatory">(обов'язково)</span></label>
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
                    <label for="section" class="form-label">Тематичний розділ</label>
                    <select class="form-select" id="section" aria-label="multiple select" wire:model="section">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($sections as $item)
                        <option value="{{ $item->section_code }}">{{ $item->section_descr }}</option>
                        @endforeach()
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Розгорнутий опис</label>
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
                        <input class="form-check-input" type="checkbox" value="metals" id="metals" wire:model="have_metals" {{ $have_metals ? 'checked' : '' }}/>
                        <label for="metals">Так, наявні дорогоцінні метали</label>
                    </div>
                    <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="jewelry" id="jewelry" wire:model="have_jewelry" {{ $have_jewelry ? 'checked' : '' }}/>
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
                    <textarea class="form-control" id="residence" rows="3" placeholder="Уведіть час та місце побутування" wire:model="residence"></textarea>
                </div>
                <div class="mb-3">
                    <label for="discovery" class="form-label">Час та місце виявлення</label>
                    <textarea class="form-control" id="discovery" rows="3" placeholder="Уведіть час та місце виявлення" wire:model="discovery"></textarea>
                </div>

                @include('action-buttons-'.$book_type)

            </div>

        </div>

        @endif

        {{-- STEP 3 --}} 

        @if ($currentStep == 3)
        <div class="step-two">

            <div class="form register-form">

                @include('arrows')

                <div class="mb-3">
                    <label for="condition" class="form-label">Стан збереження</label>
                    <select class="form-select" id="condition" aria-label="Стан збереження" wire:model="condition">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($condition_types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="restoration-info" class="form-label">Інформація щодо реставрації</label>
                    <select class="form-select" id="restoration-info" aria-label="restoration-info" wire:model="restoration">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($restorationTypes as $key => $type)
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
                    <input type="text" class="form-control" id="evaluation_price" placeholder="Укажіть оціночну вартість предмета" wire:model="evaluation_price" />
                </div>
                <div class="mb-3">
                    <label for="insurance_price" class="form-label">Страхова вартість</label>
                    <input type="text" class="form-control" id="insurance_price" placeholder="Укажіть страхову вартість предмета" wire:model="insurance_price" />
                </div>

                <p class="marking">Рух предмета</p>
                <div class="mb-3">
                    <label for="location" class="form-label">Місцезнаходження</label>
                    <select class="form-select" id="location" aria-label="Місцезнаходження" wire:model="object_location">
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($locationTypes as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <label for="date_location" class="form-label">Дата зміни місцезнаходження</label>
                        <input type="date" class="form-control" id="date_location" placeholder="Уведіть дату" wire:model="object_date"/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description_additional" class="form-label">Додатковий опис місцезнаходження</label>
                    <textarea class="form-control" id="description_additional" rows="3" placeholder="Уведіть місцерозташування предмета" wire:model="object_description"></textarea>
                </div>

                <p class="marking">Інші документи</p>
                <div class="docs" id="docs">

                    @for ($i = 0; $i < $document_count; $i++)
                    @include('document', ['doc_idx' => $i, 'is_disabled' => $item['is_disabled']??''])
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

        @include('modals.cancel')
        @include('modals.save-draft')
        @include('modals.save-complete')

    </div>
    </div>
</div>
