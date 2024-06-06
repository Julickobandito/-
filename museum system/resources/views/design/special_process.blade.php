@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <h1 class="title">Реєстрація предмета в книгах обліку</h1>
        <div class="form register-form">
            <form action="#" method="POST" id="form_income_1">
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="act_num" class="form-label">Номер акту № <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="act_num" name="text" placeholder="Укажіть номер акту" required>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="act_date" class="form-label">Дата підписання <span class="mandatory">(обов'язково)</span></label>
                        <input id="act_date" class="form-control date-test" type="date" placeholder="" required />
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="protocol_num" class="form-label">Номер протоколу № <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="protocol_num" name="text" placeholder="Укажіть номер протоколу" required>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="protocol_date" class="form-label">Дата підписання <span class="mandatory">(обов'язково)</span></label>
                        <input id="protocol_date" class="form-control date-test" type="date" placeholder="" required />
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-7">
                        <label for="account_num" class="form-label">Обліковий номер у книзі надходжень <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="account_num" name="text" placeholder="Укажіть номер акту" required>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-7">
                        <label for="account_num" class="form-label">Обліковий номер в інвентарній книзі <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="account_num" name="text" placeholder="Укажіть номер акту" required>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <div class="form register-form">
            <div class="mb-3 check-tom">
                <p>Наразі відкритим є том “1” спеціальної інвентарної книги. Том підходить?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tom_num" id="tom_yes" value="option1" checked>
                    <label class="form-check-label" for="tom_yes">
                        Так
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tom_num" id="tom_no" value="option2">
                    <label class="form-check-label" for="tom_no">
                        Ні, відкрити новий
                    </label>
                </div>
                <a href="#" class="link-form income" id="to_income_book">Перейти до списку томів інвентарної книги</a>
            </div>
            </form>
        </div>
        <div class="form register-form">
            <div class="info-div">
                <p class="register-info">Акт №2356.</p>
                <p class="register-info">Обліковий номер №456 у книзі надходження основного фонду.</p>
                <p class="register-info">Інвентарна книга “Предмети нумізматики”. Том “ПН-1”. </p>
            </div>
            <div class="info-div">
                <p style="margin-bottom: 8px">Уведіть інформацію про предмет до спеціальної інвентарної книги.</p>
            </div>
            <div class="info-div">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="transfer_info" id="transfer_info">
                    <label for="transfer_info">Перенести інформацію з книги надходження</label>
                </div>
            </div>
            <form action="#" method="POST" id="form_inventory_2">
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="account_num" class="form-label">Обліковий номер предмета <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="account_num" name="text" placeholder="Укажіть номер акту" required>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="date_register" class="form-label">Дата реєстрації предмета <span class="mandatory">(обов'язково)</span></label>
                        <input type="date" class="form-control" id="date_register" placeholder="Уведіть дату" required/>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Назва <span class="mandatory">(обов'язково)</span></label>
                        <input type="text" class="form-control" id="name" name="text" placeholder="Укажіть назву предмета" required>
                        <div class="invalid-feedback">
                            Будь ласка, заповніть поле.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="author" class="form-label">Автор</label>
                        <input type="text" class="form-control" id="author" placeholder="Укажіть автора"/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Стислий опис</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Уведіть опис предмета"></textarea>
                </div>
                <p style="margin: 12px 0 0 0;">Дорогоцінні метали</p>
                <div class="mb-3 row" id="metals">
                    <div class="field-container-1 row" style="margin-top: 12px;">
                        <div class="col-md-6">
                            <label for="metal_name" class="form-label">Назва</label>
                            <input type="text" class="form-control" id="metal_name" name="text" placeholder="Укажіть назву предмета">
                        </div>
                        <div class="col-md-6">
                            <label for="metal_mass" class="form-label">Маса</label>
                            <input type="text" class="form-control" id="metal_mass" placeholder="Укажіть масу"/>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-start">
                    <button class="btn-tertiary btn-add" type="button" id="btn-add-1">+ Додати поле</button>
                    <button class="btn-tertiary btn-remove" type="button" id="btn-remove-1">- Прибрати поле</button>
                </div>
                <p style="margin: 0;">Дорогоцінне каміння</p>
                <div class="mb-3 row" id="jewelry">
                    <div class="field-container-2 row" style="margin-top: 12px;">
                        <div class="col-md-6">
                            <label for="jewelry_name" class="form-label">Назва</label>
                            <input type="text" class="form-control" id="jewelry_name" name="text" placeholder="Укажіть назву предмета">
                        </div>
                        <div class="col-md-3">
                            <label for="jewel_mass" class="form-label">Маса</label>
                            <input type="text" class="form-control" id="jewel_mass" placeholder="Укажіть масу"/>
                        </div>
                        <div class="col-md-3">
                            <label for="sample" class="form-label">Проба</label>
                            <input type="text" class="form-control" id="sample" placeholder="Укажіть пробу"/>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-start">
                    <button class="btn-tertiary btn-add" type="button" id="btn-add-2">+ Додати поле</button>
                    <button class="btn-tertiary btn-remove" type="button" id="btn-remove-2">- Прибрати поле</button>
                </div>
                <div class="mb-3">
                    <div class="col-md-5">
                        <label for="count_num" class="form-label">Кількість одиниць зберігання</label>
                        <input type="number" class="form-control" id="count_num" placeholder="Укажіть кількість" min="1"/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sizes" class="form-label">Розміри (см/мм)</label>
                    <input type="text" class="form-control" id="sizes" placeholder="Укажіть розміри предмета"/>
                </div>
                <div class="mb-3">
                    <label for="condition" class="form-label">Стан збереження</label>
                    <select class="form-select" id="condition" aria-label="Стан збереження">
                        <option value="1">Без пошкоджень</option>
                        <option value="2">Задовільний</option>
                        <option value="3">Незадовільний</option>
                    </select>
                </div>
                <div class="mb-3 condition_descr_block" id="condition_descr_block">
                    <label for="condition_descr" class="form-label">Стислий опис пошкоджень</label>
                    <textarea class="form-control" id="condition_descr" rows="3" placeholder="Уведіть опис пошкоджень предмета"></textarea>
                </div>
                <div class="mb-3">
                    <label for="evaluation_price" class="form-label">Оціночна вартість</label>
                    <input type="text" class="form-control" id="evaluation_price" placeholder="Укажіть оціночну вартість предмета"/>
                </div>
                <div class="mb-3">
                    <label for="insurance_price" class="form-label">Страхова вартість</label>
                    <input type="text" class="form-control" id="insurance_price" placeholder="Укажіть страхову вартість предмета"/>
                </div>
            </form>
        </div>
        <div class="form register-form">
            <form action="#" method="POST" id="form_income_2">
                <div class="mb-3">
                    <label for="location" class="form-label">Місцезнаходження</label>
                    <select class="form-select" id="location" aria-label="Місцезнаходження">
                        <option value="1">Експозиція</option>
                        <option value="2">Зал</option>
                        <option value="3">Вітрина</option>
                        <option value="4">Фондосховище</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <label for="date_location" class="form-label">Дата зміни місцезнаходження</label>
                        <input type="date" class="form-control" id="date_location" placeholder="Уведіть дату"/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="location_descr" class="form-label">Додатковий опис місцезнаходження</label>
                    <textarea class="form-control" id="location_descr" rows="3" placeholder="Уведіть місцерозташування предмета"></textarea>
                </div>
                <p style="margin-top: 24px;"> Інші документи</p>
                <div class="docs" id="docs">
                    <div class="field-container-3">
                        <div class="mb-3">
                            <label for="doc_type" class="form-label">Тип документа</label>
                            <select class="form-select" id="doc_type" aria-label="doc_type">
                                <option value="1">Акт здачі-приймання</option>
                                <option value="2">Протокол засідання</option>
                                <option value="4">Акт експертних випробувань</option>
                                <option value="4">Акт експертизи</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="doc_num" class="form-label">№ документа</label>
                                <input type="text" class="form-control" id="doc_num" name="text" placeholder="Укажіть номер акту" required>
                                <div class="invalid-feedback">
                                    Будь ласка, заповніть поле.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="doc_date" class="form-label">Дата підписання документа</label>
                                <input type="date" class="form-control" id="doc_date" placeholder="Уведіть дату"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-start">
                    <button class="btn-tertiary btn-add" type="button" id="btn-add-3">+ Додати поле</button>
                    <button class="btn-tertiary btn-remove" type="button" id="btn-remove-3">- Прибрати поле</button>
                </div>
            </form>
            <div class="buttons">
                <button class="btn-tertiary" type="button" data-bs-toggle="modal" data-bs-target="#delete_Modal">Скасувати</button>
                <button class="btn-sec" type="button" data-bs-toggle="modal" data-bs-target="#draft_Modal">Зберегти в чорнетку</button>
                <button class="btn-main" type="button">Зберегти</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="draft_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Зверніть увагу!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Усі збережені чорнетки Ви можете переглянути на вкладці <strong>“Чорнетки обліку предметів”</strong>
                        у кабінеті обліковця.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="button" class="btn-main">Зберегти</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Зверніть увагу!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Після скасування процесу реєстрації предмета, жодні дані не збережуться.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-main">Скасувати процес реєстрації</button>
                </div>
            </div>
        </div>
    </div>
@endsection
