@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Тематичні колекції</h1>
            <button type="button" class="btn-main" data-bs-toggle="modal" data-bs-target="#createCollection">
                Створити колекцію</button>
        </div>
        <div class="div">
            <table class="table-edit" style="width: 80%;">
                <thead>
                <tr>
                    <th>Назва</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td><a href="/collection_records" class="link">Картини 19 століття</a></td>
                    <td class="last-td d-flex justify-content-end">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editCollection">
                            Редагувати</button>
                    </td>
                </tr>
                <tr class="table-row">
                    <td><a href="/collection_records" class="link">Картини Середньовіччя</a></td>
                    <td class="last-td d-flex justify-content-end">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#editCollection">
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

        <div class="modal fade" id="createCollection" tabindex="-1" aria-labelledby="editCollection" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Створити колекцію</h5>
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
                                      placeholder="Уведіть опис колекції"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                        <button type="button" class="btn-main">Створити</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCollection" tabindex="-1" aria-labelledby="editCollection" aria-hidden="true">
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
                                      placeholder="Уведіть опис колекції"></textarea>
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
