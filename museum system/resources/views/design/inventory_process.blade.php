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
            </form>
        </div>
        <div class="form register-form">
            <p>Оберіть інвентарну книгу для запису:</p>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="save_group" class="form-label">Група зберігання</label>
                    <select class="form-select" id="save_group"  aria-label="multiple select example">
                        <option value="1">Образотворче мистецтво</option>
                        <option value="2">Археологія</option>
                        <option value="3">Зразки природи</option>
                        <option value="3">Предмети нумізматики</option>
                        <option value="2">Археологія</option>
                        <option value="3">Зразки природи</option>
                        <option value="3">Предмети нумізматики</option>
                    </select>
                </div>
                <div class="d-flex justify-content-start">
                    <p>Немає необхідної групи? <span>&#8203;</span></p>
                    <a href="#" class="link-form" id="to_inventory_book">Перейти до списку томів інвентарної книги</a>
                </div>

                <div class="mb-3 check-tom">
                    <p>Наразі відкритим є том “1” інвентарної книги “Трипільські горщики”. Том підходить?</p>
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
                <p style="margin-bottom: 8px">Уведіть інформацію про предмет до інвентарної книги.</p>
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
                    <label for="section" class="form-label">Розділ групи зберігання</label>
                    <select class="form-select" id="section"  aria-label="multiple select example">
                        <option value="1">Графіка 19 століття</option>
                        <option value="2">Антична археологія</option>
                        <option value="2">Зразки природи часів палеоліту</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Розгорнутий опис</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Уведіть опис предмета"></textarea>
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
                    <label for="materials" class="form-label">Матеріали</label>
                    <input type="text" class="form-control" id="materials" placeholder="Укажіть матеріали"/>
                </div>
                <div class="mb-3">
                    <label for="condition" class="form-label">Стан збереження</label>
                    <select class="form-select select-color" id="condition" aria-label="Стан збереження">
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
                    <label for="restoration-info" class="form-label">Інформація щодо реставрації</label>
                    <select class="form-select" id="restoration-info" aria-label="restoration-info">
                        <option value="1">Не потребує реставрації</option>
                        <option value="2">Проведено реставрацію</option>
                        <option value="3">Потребує рестраврацію</option>
                        <option value="4">Потребує термінову рестраврацію</option>
                        <option value="5">Проведено консервацію</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="source_income" class="form-label">Джерело надходження</label>
                    <textarea class="form-control" id="source_income" rows="3" placeholder="Уведіть джерело надходження"></textarea>
                </div>
                <div class="mb-3">
                    <label for="receipt_method" class="form-label">Спосіб надходження</label>
                    <select class="form-select" id="receipt_method" aria-label="Спосіб надходження">
                        <option value="1">Закупка</option>
                        <option value="2">Замовлення</option>
                        <option value="3">Дарунок</option>
                        <option value="4">Передача</option>
                    </select>
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
                    <label for="creation" class="form-label">Час та місце створення</label>
                    <textarea class="form-control" id="creation" rows="3" placeholder="Уведіть час та місце створення"></textarea>
                </div>
                <div class="mb-3">
                    <label for="residence" class="form-label">Час та місце побутування</label>
                    <textarea class="form-control" id="residence" rows="3" placeholder="Уведіть час та місце побутування"></textarea>
                </div>
                <div class="mb-3">
                    <label for="discovery" class="form-label">Час та місце виявлення</label>
                    <textarea class="form-control" id="discovery" rows="3" placeholder="Уведіть час та місце виявлення"></textarea>
                </div>
                <div class="mb-3">
                    <p>Чи наявні дорогоцінне каміння або дорогоцінні метали?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="jewelry" id="jewelry">
                        <label for="jewelry">Так, наявне дорогоцінне каміння</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="metals" id="metals">
                        <label for="metals">Так, наявні дорогоцінні метали</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="technique" class="form-label">Техніка виготовлення</label>
                    <input type="text" class="form-control" id="technique" placeholder="Укажіть техніку виготовлення предмета"/>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Місцезнаходження</label>
                    <select class="form-select" id="location" aria-label="Місцезнаходження">
                        <option value="1">Постійно діюча експозиція</option>
                        <option value="2">Виставка</option>
                        <option value="4">Фондосховище</option>
                        <option value="4">На реставрації</option>
                        <option value="4">Втрачено</option>
                        <option value="4">Знищено</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <label for="date_location" class="form-label">Дата зміни місцезнаходження</label>
                        <input type="date" class="form-control" id="date_location" placeholder="Уведіть дату"/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description_additional" class="form-label">Додатковий опис місцезнаходження</label>
                    <textarea class="form-control" id="description_additional" rows="3" placeholder="Уведіть місцерозташування предмета"></textarea>
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
    <div class="modal fade" id="draft_Modal" tabindex="-1" aria-labelledby="modal-title-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-1">Зверніть увагу!</h5>
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

    <div class="modal fade" id="delete_Modal" tabindex="-1" aria-labelledby="modal-title-2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-2">Зверніть увагу!</h5>
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
