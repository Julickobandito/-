<div class="wrapper">
    <div class="multistep-form">
        <h1 class="title">Реєстрація предмета в книгах обліку</h1>
        <div id="form_income" wire:submit.prevent="save">

        @include('steps-indicator')

        <input type="hidden" wire:model="user_id" />

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        <div class="step-two">

            <div class="form register-form">

                @include('arrows')

                <div class="info-div">
                    <p class="register-info">Обліковий номер №{{ $act_doc_num }} у книзі надходження <i>основного</i> фонду.</p>
                    <p class="register-info">Інвентарна книга “{{ $book_description }}”. Том “{{ $book_code }}”. </p>
                </div>
                <div class="info-div">
                    <p style="margin-bottom: 8px">Уведіть інформацію про предмет до спеціальної інвентарної книги.</p>
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
                        <input type="text" class="form-control" id="obj_name" name="obj_name" placeholder="Укажіть назву предмета" wire:model="obj_name" disabled />
                        <span class="text-danger"> @error('obj_name') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="author" class="form-label">Автор</label>
                        <input type="text" class="form-control" id="author" placeholder="Укажіть автора" wire:model="author"  disabled />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Розгорнутий опис</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Уведіть опис предмета" wire:model="description" disabled></textarea>
                </div>

                <div class="mb-3">
                    <p>Чи наявні дорогоцінне каміння або дорогоцінні метали?</p>
                    <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="metals" id="have_metals" wire:model="have_metals" {{ $have_metals ? 'checked' : '' }} disabled/>
                        <label for="metals">Так, наявні дорогоцінні метали</label>
                    </div>
                    <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="jewelry" id="have_jewelry" wire:model="have_jewelry" {{ $have_jewelry ? 'checked' : '' }} disabled/>
                        <label for="jewelry">Так, наявне дорогоцінне каміння</label>
                    </div>
                </div>

                <p class="marking special">Дорогоцінні метали</p>
                @foreach($metals as $idx => $item)
                <div class="mb-3" id="metals">
                    <div class="field-container-1 row">
                        <div class="col-md-6">
                            <label for="metal_name" class="form-label">Назва</label>
                            <select type="text" class="form-control" id="metal_name" name="text" wire:model="metals.{{ $idx }}.name">
                                <option value="">{{ config('msg.not-selected') }}</option>
                                @foreach($jewelNames['metal'] as $key => $jewel)
                                <option value="{{ $key }}">{{ $jewel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="metal_mass" class="form-label">Маса, гр.</label>
                            <input type="text" class="form-control" id="metal_mass" placeholder="Укажіть масу" wire:model="metals.{{ $idx }}.mass"/>
                        </div>
                        <div class="col-md-3">
                            <label for="sample" class="form-label">Проба</label>
                            <input type="text" class="form-control" id="sample" placeholder="Укажіть пробу" wire:model="metals.{{ $idx }}.sample"/>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-start">
                    <button class="btn-tertiary btn-add" type="button" id="btn-add-1" wire:click="addMetal">+ Додати метал</button>
                    <button class="btn-tertiary btn-remove" type="button" id="btn-remove-1" wire:click="removeMetal">- Прибрати метал</button>
                </div>

                <p class="marking special">Дорогоцінне каміння</p>
                @foreach($gems as $idx => $item)
                <div class="mb-3" id="jewelry">
                    <div class="field-container-2 row">
                        <div class="col-md-6">
                            <label for="jewelry_name" class="form-label">Назва</label>

                            <select type="text" class="form-control" id="gem_name" name="text" wire:model="gems.{{ $idx }}.name">
                                <option value="">{{ config('msg.not-selected') }}</option>
                                @foreach($jewelNames['gem'] as $key => $jewel)
                                <option value="{{ $key }}">{{ $jewel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="jewel_mass" class="form-label">Маса, гр.</label>
                            <input type="text" class="form-control" id="gem_mass" placeholder="Укажіть масу" wire:model="gems.{{ $idx }}.mass"/>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-start" style="margin-bottom: 24px;">
                <button class="btn-tertiary btn-add" type="button" id="btn-add-2" wire:click="addGem">+ Додати камінь</button>
                    <button class="btn-tertiary btn-remove" type="button" id="btn-remove-2" wire:click="removeGem">- Прибрати камінь</button>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="count_num" class="form-label">Кількість одиниць зберігання</label>
                        <input type="number" class="form-control" id="count_num" placeholder="Укажіть кількість" min="1" value="1" wire:model="amount" disabled/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sizes" class="form-label">Розміри (см/мм)</label>
                    <input type="text" class="form-control" id="sizes" placeholder="Укажіть розміри предмета" wire:model="sizes" disabled/>
                </div>
                <div class="mb-3">
                    <label for="materials" class="form-label">Матеріали</label>
                    <input type="text" class="form-control" id="materials" placeholder="Укажіть матеріали" wire:model="materials" disabled/>
                </div>

                @if($technique)
                <div class="mb-3">
                    <label for="technique" class="form-label">Техніка виготовлення</label>
                    <input type="text" class="form-control" id="technique" placeholder="Укажіть техніку виготовлення предмета" wire:model="technique" disabled/>
                </div>
                @endif
                @if($creation)
                <div class="mb-3">
                    <label for="creation" class="form-label">Час та місце створення</label>
                    <textarea class="form-control" id="creation" rows="3" placeholder="Уведіть час та місце створення" wire:model="creation" disabled></textarea>
                </div>
                @endif
                <div class="mb-3">
                    <label for="residence" class="form-label">Час та місце побутування</label>
                    <textarea class="form-control" id="residence" rows="3" placeholder="Уведіть час та місце побутування" wire:model="residence" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="discovery" class="form-label">Час та місце виявлення</label>
                    <textarea class="form-control" id="discovery" rows="3" placeholder="Уведіть час та місце виявлення" wire:model="discovery" disabled></textarea>
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

                <div class="mb-3">
                    <label for="condition" class="form-label">Стан збереження</label>
                    <select class="form-select" id="condition" aria-label="Стан збереження" wire:model="condition" disabled>
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($condition_types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="restoration-info" class="form-label">Інформація щодо реставрації</label>
                    <select class="form-select" id="restoration-info" aria-label="restoration-info" wire:model="restoration" disabled>
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($restorationTypes as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="source_income" class="form-label">Джерело надходження</label>
                    <textarea class="form-control" id="source_income" rows="3" placeholder="Уведіть джерело надходження" wire:model="source_income" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="receipt_method" class="form-label">Спосіб надходження</label>
                    <select class="form-select" id="receipt_method" aria-label="Спосіб надходження" wire:model="income_method" disabled>
                        <option value="">{{ config('msg.not-selected') }}</option>
                        @foreach($income_method_types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="evaluation_price" class="form-label">Оціночна вартість</label>
                    <input type="text" class="form-control" id="evaluation_price" placeholder="Укажіть оціночну вартість предмета" wire:model="evaluation_price" disabled/>
                </div>
                <div class="mb-3">
                    <label for="insurance_price" class="form-label">Страхова вартість</label>
                    <input type="text" class="form-control" id="insurance_price" placeholder="Укажіть страхову вартість предмета" wire:model="insurance_price" disabled/>
                </div>
                <p class="marking">Інші документи</p>
                <div class="docs" id="docs">

                    @foreach ($docs as $idx => $item)
                    @include('document', ['doc_idx' => $idx, 'is_disabled' => $item['is_disabled']??''])
                    @endforeach

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
