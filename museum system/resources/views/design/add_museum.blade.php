@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Облік музеїв</h1>
            <button type="button" class="btn-main" data-bs-toggle="modal"
                    data-bs-target="#addMuseum">Зареєструвати музей</button>
        </div>
        <div class="div">
            <table class="table-edit">
                <thead>
                <tr>
                    <th>Назва</th>
                    <th>Тип музею</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td>Музей імені Тараса Шевченка</td>
                    <td>Меморіальний музей</td>
                    <td class="last-td">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editMuseum">Редагувати</button>
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

        <div class="modal fade" id="addMuseum" tabindex="-1" aria-labelledby="addMuseum-title" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-1">Зареєструвати музей</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_name" class="form-label">Назва музею</label>
                            <input type="text" class="form-control" id="museum_name" name="text"
                                   placeholder="Уведіть назву музею" required>
                        </div>
                        <div class="mb-3">
                            <label for="museum_type" class="form-label">Тип музею</label>
                            <select class="form-select" id="museum_type"  aria-label="museum_type">
                                <option value="1">Природничий музей</option>
                                <option value="2">Історичний музей</option>
                                <option value="2">Меморіальний музей</option>
                                <option value="2">Науково-технічний музей</option>
                                <option value="2">Художній музей</option>
                                <option value="2">Музей мистецького та театрального профілю</option>
                            </select>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_code" class="form-label">Шифр музею</label>
                            <input type="text" class="form-control" id="museum_name" name="text"
                                   placeholder="Уведіть шифр музею" required>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_department" class="form-label" >Назва відомства</label>
                            <input type="text" class="form-control" id="museum_name" name="text"
                                   placeholder="Уведіть назву відомства" required>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_institution" class="form-label">Назва установи підпорядкування</label>
                            <input type="text" class="form-control" id="museum_institution" name="text"
                                   placeholder="Уведіть назву установи підпорядкування" required>
                        </div>
                        <div class="mb-3">
                            <label for="museum_description" class="form-label">Опис</label>
                            <textarea class="form-control" id="museum_description" rows="3" placeholder="Уведіть опис музею"></textarea>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_address" class="form-label">Адреса музею</label>
                            <input type="text" class="form-control" id="museum_address" name="text"
                                   placeholder="Уведіть місцерозташування музею" required>
                        </div>
                        <div class="mb-3">
                            <label for="museum_contacts" class="form-label">Контакти</label>
                            <textarea class="form-control" id="museum_contacts" rows="3" placeholder="Уведіть контакти музею"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Зберегти</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editMuseum" tabindex="-1" aria-labelledby="addMuseum-title" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-1">Зареєструвати музей</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_name" class="form-label">Назва музею</label>
                            <input type="text" class="form-control" id="museum_name" name="text"
                                   placeholder="Уведіть назву музею" required>
                        </div>
                        <div class="mb-3">
                            <label for="museum_type" class="form-label">Тип музею</label>
                            <select class="form-select" id="museum_type"  aria-label="museum_type">
                                <option value="1">Природничий музей</option>
                                <option value="2">Історичний музей</option>
                                <option value="2">Меморіальний музей</option>
                                <option value="2">Науково-технічний музей</option>
                                <option value="2">Художній музей</option>
                                <option value="2">Музей мистецького та театрального профілю</option>
                            </select>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_code" class="form-label">Шифр музею</label>
                            <input type="text" class="form-control" id="museum_name" name="text"
                                   placeholder="Уведіть шифр музею" required>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_department" class="form-label" >Назва відомства</label>
                            <input type="text" class="form-control" id="museum_name" name="text"
                                   placeholder="Уведіть назву відомства" required>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_institution" class="form-label">Назва установи підпорядкування</label>
                            <input type="text" class="form-control" id="museum_institution" name="text"
                                   placeholder="Уведіть назву установи підпорядкування" required>
                        </div>
                        <div class="mb-3">
                            <label for="museum_description" class="form-label">Опис</label>
                            <textarea class="form-control" id="museum_description" rows="3" placeholder="Уведіть опис музею"></textarea>
                        </div>
                        <div class="md-3" style="margin-bottom:12px; ">
                            <label for="museum_address" class="form-label">Адреса музею</label>
                            <input type="text" class="form-control" id="museum_address" name="text"
                                   placeholder="Уведіть місцерозташування музею" required>
                        </div>
                        <div class="mb-3">
                            <label for="museum_contacts" class="form-label">Контакти</label>
                            <textarea class="form-control" id="museum_contacts" rows="3" placeholder="Уведіть контакти музею"></textarea>
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
