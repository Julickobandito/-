@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Працівники</h1>
            <button type="button" class="btn-main" data-bs-toggle="modal" data-bs-target="#createMember">
                Зареєструвати працівника</button>
        </div>
        <div class="div">
            <table class="table-edit" style="width: 80%;">
                <thead>
                <tr>
                    <th>ПІБ</th>
                    <th>Роль</th>
                    <th>Музей</th>
                    <th>E-mail</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td>Вікторія Йосипівна Дмитренко</td>
                    <td>Обліковець</td>
                    <td>Музей Івана Гончара</td>
                    <td>example@gmail.com</td>
                    <td class="last-td d-flex justify-content-end align-items-baseline">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editMember">
                            Редагувати</button>
                        <button type="button" class="btn-tertiary staff-btn" style="margin-left: 12px;"
                                data-bs-toggle="modal" data-bs-target="#deactivateUser">
                            Деактивувати</button>
                    </td>
                </tr>
                <tr class="table-row">
                    <td>Олексій Іванович Петренко</td>
                    <td>Обліковець</td>
                    <td>Музей сучасного мистецтва</td>
                    <td>example@gmail.com</td>
                    <td class="last-td d-flex justify-content-end align-items-baseline">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editRecord">
                            Редагувати</button>
                        <button type="button" class="btn-tertiary staff-btn" style="margin-left: 12px;"
                                data-bs-toggle="modal" data-bs-target="#deactivateUser">
                            Деактивувати</button>
                    </td>
                </tr>
                <tr class="table-row deactivated">
                    <td>Олексій Іванович Петренко</td>
                    <td>Обліковець</td>
                    <td>Музей сучасного мистецтва</td>
                    <td>example@gmail.com</td>
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

        <div class="modal fade" id="createMember" tabindex="-1" aria-labelledby="editRecord" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Зареєструвати працівника</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">ПІБ</label>
                            <input type="text" class="form-control" id="fullname" placeholder="Уведіть ПІБ працівника"/>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Роль</label>
                            <select class="form-select" id="role" aria-label="role">
                                <option value="1">Обліковець</option>
                                <option value="2">Науковий співробітник</option>
                                <option value="4">Директор</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Музей</label>
                            <select class="form-select" id="role" aria-label="role">
                                <option value="1">Музей Івана Гончара</option>
                                <option value="2">Музей Івана Франка</option>
                                <option value="4">Музей однієї вулиці</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Уведіть Email працівника"/>
                        </div>
                        <button class="link-form generate" id="generate">Згенерувати логін та пароль користувача</button>
                        <div class="success">
                            <img src="/img/success.svg" alt="success">
                            <p>Ім’я користувача та пароль були успішно згенеровані. Після реєстрації логін та пароль
                                будуть відправлені на пошту створеному користувачу.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Зареєструвати</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editMember" tabindex="-1" aria-labelledby="editRecord" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Редагувати інформацію</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">ПІБ</label>
                            <input type="text" class="form-control" id="fullname" placeholder="Уведіть ПІБ працівника"/>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Роль</label>
                            <select class="form-select" id="role" aria-label="role">
                                <option value="1">Обліковець</option>
                                <option value="2">Науковий співробітник</option>
                                <option value="4">Директор</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Музей</label>
                            <select class="form-select" id="role" aria-label="role">
                                <option value="1">Музей Івана Гончара</option>
                                <option value="2">Музей Івана Франка</option>
                                <option value="4">Музей однієї вулиці</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Уведіть Email працівника"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Зареєструвати</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deactivateUser" tabindex="-1" aria-labelledby="deactivateUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Попередження</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <p>Увага! Після деактивації користувача, він більше не буде мати доступу до системи.</p>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Деактивувати</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
