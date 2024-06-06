@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Предмети нумізматики. Том 1</h1>
            <a href="/inventory_process" class="btn-main">Створити новий запис</a>
        </div>
        <div class="div">
            <table class="table-edit" style="width: 80%;">
                <thead>
                <tr>
                    <th>Обліковий номер</th>
                    <th>Назва предмета</th>
                    <th>Дата реєстрації</th>
                    <th>Останнє редагування</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td>№00001</td>
                    <td>Картина “Запорожці”</td>
                    <td>22.04.2022</td>
                    <td>28.04.2023</td>
                    <td class="last-td d-flex justify-content-end align-items-baseline">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editRecord">
                            Редагувати</button>
                        <a href="/inventory_record" class="btn-tertiary" style="margin-left: 16px;">Переглянути</a>
                    </td>
                </tr>
                <tr class="table-row">
                    <td>№00002</td>
                    <td>Картина “Цар-Колос”</td>
                    <td>25.04.2022</td>
                    <td>28.04.2023</td>
                    <td class="last-td d-flex justify-content-end align-items-baseline">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editRecord">
                            Редагувати</button>
                        <a href="/inventory_record" class="btn-tertiary" style="margin-left: 16px;">Переглянути</a>
                    </td>
                </tr>
            </table>
            <div class="paging" id="paging">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous" style="color: #323461;">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" style="color: #323461;" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" style="color: #323461;" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" style="color: #323461;" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" style="color: #323461;" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="modal fade" id="editRecord" tabindex="-1" aria-labelledby="editRecord" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Редагувати інформацію</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-3" style="margin-bottom: 12px;">
                            <label for="condition" class="form-label">Стан збереження</label>
                            <select class="form-select select-color" id="condition" aria-label="Стан збереження">
                                <option value="1">Без пошкоджень</option>
                                <option value="2">Задовільний</option>
                                <option value="3">Незадовільний</option>
                            </select>
                        </div>
                        <div class="mb-3 condition_descr_block" id="condition_descr_block">
                            <label for="condition_descr" class="form-label">Стислий опис пошкоджень</label>
                            <textarea class="form-control" id="condition_descr" rows="3"
                                      placeholder="Уведіть опис пошкоджень предмета"></textarea>
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
                        <p class="marking"> Рух предмета</p>
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
                        <p class="marking"> Інші документи</p>
                        <div class="docs" id="docs-2">
                            <div class="field-container-4">
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
                            <button class="btn-tertiary btn-add" type="button" id="btn-add-4">+ Додати поле</button>
                            <button class="btn-tertiary btn-remove" type="button" id="btn-remove-4">- Прибрати поле</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Зберегти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
