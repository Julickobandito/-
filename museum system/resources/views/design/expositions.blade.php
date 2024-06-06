@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Виставки</h1>
            <button type="button" class="btn-main" data-bs-toggle="modal" data-bs-target="#createExposition">
                Створити виставку</button>
        </div>
        <div class="div">
            <table class="table-edit" style="width: 80%;">
                <thead>
                <tr>
                    <th>Назва</th>
                    <th>Дата початку</th>
                    <th>Дата завершення</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td><a href="/exposition_records" class="link">Картини 19 століття</a></td>
                    <td>12.04.2023</td>
                    <td>18.05.2023</td>
                    <td class="last-td d-flex justify-content-end">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editExposition">
                            Редагувати</button>
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

        <div class="modal fade" id="createExposition" tabindex="-1" aria-labelledby="createExposition" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Створити виставку</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="collection_name" class="form-label">Назва</label>
                            <input type="text" class="form-control" id="collection_name" placeholder="Уведіть назву" required/>
                        </div>
                        <div class="mb-3">
                            <label for="tom_description" class="form-label">Опис</label>
                            <textarea class="form-control" id="tom_description" rows="4"
                                      placeholder="Уведіть опис експозиції"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Дата початку</label>
                            <input type="date" class="form-control" id="start_date" name="text" placeholder="Укажіть дату початку">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Дата завершення</label>
                            <input type="date" class="form-control" id="end_date" name="text" placeholder="Укажіть дату завершення">
                        </div>
                        <div class="mb-3">
                            <label for="description_additional" class="form-label">Опис місцезнаходження</label>
                            <textarea class="form-control" id="description_additional" rows="3" placeholder="Уведіть місцерозташування предмета"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Зберегти</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editExposition" tabindex="-1" aria-labelledby="editExposition" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Редагувати інформацію</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="collection_name" class="form-label">Назва</label>
                            <input type="text" class="form-control" id="collection_name" placeholder="Уведіть назву" required/>
                        </div>
                        <div class="mb-3">
                            <label for="tom_description" class="form-label">Опис</label>
                            <textarea class="form-control" id="tom_description" rows="4"
                                      placeholder="Уведіть опис експозиції"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Дата початку</label>
                            <input type="date" class="form-control" id="start_date" name="text" placeholder="Укажіть дату початку">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Дата завершення</label>
                            <input type="date" class="form-control" id="end_date" name="text" placeholder="Укажіть дату завершення">
                        </div>
                        <div class="mb-3">
                            <label for="description_additional" class="form-label">Опис місцезнаходження</label>
                            <textarea class="form-control" id="description_additional" rows="3" placeholder="Уведіть місцерозташування предмета"></textarea>
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
