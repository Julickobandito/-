@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Спеціальна інвентарна книга</h1>
            <button type="button" class="btn-main" data-bs-toggle="modal"
                    data-bs-target="#register_Modal">Зареєструвати том</button>
        </div>

        <div class="div">
            <table class="table-edit" style="width: 50%;">
                <thead>
                <tr>
                    <th>Том</th>
                    <th>Статус</th>
                    <th>Облікові номери</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td><a href="/special_tom" class="link">Том 1.</a></td>
                    <td>Завершений</td>
                    <td>№1 - №456</td>
                    <td class="last-td d-flex justify-content-end align-items-baseline">
                        <button type="button" class="btn-img" data-bs-toggle="modal" data-bs-target="#tomInfo"
                                style="margin-right: 16px;"><img src="/img/info.svg" alt="info"></button>
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editMuseum">Редагувати</button>
                    </td>
                </tr>
                <tr class="table-row">
                    <td><a href="/special_tom" class="link">Том 2.</a></td>
                    <td>Активний</td>
                    <td>----</td>
                    <td class="last-td d-flex justify-content-end align-items-baseline">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editMuseum">Редагувати</button>
                    </td>
                </tr>
            </table>
            <div class="paging" id="paging">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="/special_tom" aria-label="Previous" style="color: #323461;">
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

        <div class="modal fade" id="register_Modal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Зареєструвати новий том</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-3" style="margin-bottom: 12px;">
                            <label for="tom_name" class="form-label">Назва тому</label>
                            <input type="text" class="form-control" id="tom_name" name="text"
                                   placeholder="Уведіть назву тому" required>
                        </div>
                        <div class="mb-3">
                            <label for="tom_description" class="form-label">Опис</label>
                            <textarea class="form-control" id="tom_description" rows="4"
                                      placeholder="Уведіть опис тому"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Зареєструвати</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editMuseum" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Редагувати том</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-3" style="margin-bottom: 12px;">
                            <label for="tom_name" class="form-label">Назва тому</label>
                            <input type="text" class="form-control" id="tom_name" name="text"
                                   placeholder="Уведіть назву тому" required>
                        </div>
                        <div class="mb-3">
                            <label for="tom_description" class="form-label">Опис</label>
                            <textarea class="form-control" id="tom_description" rows="4"
                                      placeholder="Уведіть опис тому"></textarea>
                        </div>
                        <div class="mb-3" style="margin-bottom: 12px;">
                            <label for="tom_type" class="form-label">Статус</label>
                            <select class="form-select" id="tom_type" aria-label="museum_type">
                                <option value="1">Відкритий</option>
                                <option value="2">Завершений</option>
                            </select>
                        </div>
                        <div class="warning" style="display: none;">
                            <img src="/img/warning.svg" alt="info">
                            <p>Після закриття тому ви не зможете більше вносити туди записи.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Редагувати</button>
                    </div>
                </div>
            </div>
        </div>
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
                                <p class="column-2">Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                                    Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий
                                    друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не
                                    тільки успішно пережила п'ять століть, але й прижилася в електронному верстуванні,
                                    залишаючись по суті незмінною.</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Облікові номери предметів:</p>
                                <p class="column-2">№1012 - 1305</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Предметів обліковано:</p>
                                <p class="column-2">110</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Обліковець:</p>
                                <p class="column-2">Петренко Петро Петрович</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
