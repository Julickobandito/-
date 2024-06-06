@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Облік інвентарних книг. Групи зберігання</h1>
            <button type="button" class="btn-main" data-bs-toggle="modal"
                    data-bs-target="#register_Modal">Додати групу зберігання</button>
        </div>
        <div class="div">
            <table class="table-edit" style="width: 50%;">
                <thead>
                <tr>
                    <th>Група зберігання</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td><a href="/storage_group" class="link">Твори мистецтва</a></td>
                    <td class="last-td d-flex justify-content-end">
                        <button type="button" class="btn-sec" data-bs-toggle="modal"
                                data-bs-target="#edit_Modal">Редагувати</button>
                    </td>
                </tr>
                <tr class="table-row">
                    <td><a href="/storage_group" class="link">Меморіальні предмети</a></td>
                    <td class="last-td d-flex justify-content-end">
                        <button type="button" class="btn-sec" data-bs-toggle="modal"
                                data-bs-target="#edit_Modal">Редагувати</button>
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
    </div>

    <div class="modal fade" id="register_Modal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Додати групу зберігання</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="md-3" style="margin-bottom: 12px;">
                        <label for="group_name" class="form-label">Назва</label>
                        <input type="text" class="form-control" id="group_name" name="text"
                               placeholder="Уведіть назву групи зберігання" required>
                    </div>
                    <div class="mb-3">
                        <label for="tom_description" class="form-label">Опис</label>
                        <textarea class="form-control" id="tom_description" rows="4"
                                  placeholder="Уведіть опис групи зберігання"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="button" class="btn-main">Додати</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_Modal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редагувати інформацію</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="md-3" style="margin-bottom: 12px;">
                        <label for="group_name" class="form-label">Назва</label>
                        <input type="text" class="form-control" id="group_name" name="text"
                               placeholder="Уведіть назву групи зберігання" required>
                    </div>
                    <div class="mb-3">
                        <label for="tom_description" class="form-label">Опис</label>
                        <textarea class="form-control" id="tom_description" rows="4"
                                  placeholder="Уведіть опис групи зберігання"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="button" class="btn-main">Зберегти</button>
                </div>
            </div>
        </div>
    </div>
@endsection
