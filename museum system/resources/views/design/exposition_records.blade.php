@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Картини 19 століття</h1>
            <a href="/cartoteca_choose" class="btn-main">Додати у виставку</a>
        </div>
        <div class="div">
            <table class="table-edit" style="width: 80%;">
                <thead>
                <tr>
                    <th>Обліковий номер</th>
                    <th>Назва</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td>№049035</td>
                    <td>Картина “Пробудження”</td>
                    <td class="last-td d-flex justify-content-end">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#view">
                            Переглянути</button>
                        <button type="button" class="btn-tertiary">Видалити</button>
                    </td>
                </tr>
                <tr class="table-row">
                    <td>№049035</td>
                    <td>Картина “Пробудження”</td>
                    <td class="last-td d-flex justify-content-end">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#view">
                            Переглянути</button>
                        <button type="button" class="btn-tertiary">Видалити</button>
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
        <div class="modal fade" id="view" tabindex="-1" aria-labelledby="view" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Картина “Запорожці”</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-3">
                            <div class="d-flex">
                                <p class="p-bold column-1">Обліковий номер у книзі надходження:</p>
                                <p class="column-2">№049035</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Автор:</p>
                                <p class="column-2">Ілля Ріпін</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Опис:</p>
                                <p class="column-2">Ріпин сам на достатньому рівні знав історію українського народу,
                                    проте задля створення цієї роботи звернувся до історика Дмитра Яворницького (на
                                    картині зобразив його писарем). У листі до Володимира Стасова Ілля Рєпін писав:
                                    «…ніхто на всьому світі не відчував так глибоко свободи, рівності й братерства, як
                                    козаки»[2].
                                    Попередні замальовки (альбом «Малоросійські типи») здійснив під час подорожі
                                    1880—1881 років. Коли в літературному журналі «Північ» 1886 року надрукували один із
                                    цих ескізів під назвою «Хохол», Рєпін звернувся до гравера В. Мате, аби той передав
                                    редактору журналу П. М. Гнедичу, щоб він не змінював написів під його творами на ті,
                                    які неправильно відображають назву народу й принижують його національну
                                    гідність[3].</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Група зберігання:</p>
                                <p class="column-2">Образотворче мистецтво</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Розділ групи зберігання:</p>
                                <p class="column-2">Графіка 20 століття</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Інформація щодо реставрації:</p>
                                <p class="column-2">Не потребує реставрації</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Розмір:</p>
                                <p class="column-2">203 × 358 см</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Матеріал:</p>
                                <p class="column-2">Олія, полотно</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Місцезнаходження:</p>
                                <p class="column-2">Постійно діюча експозиція</p>
                            </div>
                            <div class="d-flex">
                                <p class="p-bold column-1">Опис розташування:</p>
                                <p class="column-2">Експозиція, зал N 2, вітрина N9, п.1.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
