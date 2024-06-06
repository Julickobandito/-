@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Картотека</h1>
        </div>
        <div class=" container-fluid row align-items-end search">
            <div class="col-md-2">
                <label for="num_search" class="form-label">№ в книзі надходжень</label>
                <input type="search" class="form-control" id="num_search" placeholder="Уведіть №"/>
            </div>
            <div class="col-md-2">
                <label for="name_search" class="form-label">Назва</label>
                <input type="search" class="form-control" id="name_search" placeholder="Уведіть назву"/>
            </div>
            <div class="col-md-2">
                <label for="author_search" class="form-label">Автор</label>
                <input type="search" class="form-control" id="author_search" placeholder="Уведіть автора"/>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
                <label for="section" class="form-label">Розділ групи зберігання</label>
                <select class="form-select" id="section"  aria-label="multiple select example">
                    <option value="1">Графіка 19 століття</option>
                    <option value="2">Антична археологія</option>
                    <option value="2">Зразки природи часів палеоліту</option>
                </select>
            </div>
            <div class="col-md-4" style="margin-top: 12px;">
                <label for="author_search" class="form-label">Розширений пошук</label>
                <input type="search" class="form-control" id="author_search" placeholder="Уведіть ключові слова"/>
            </div>
            <div class="col-md-2">
                <button class="btn-main" style="margin-top:0;">Пошук</button>
            </div>
        </div>
        <div class="mb-3 align-items-end"><button class="btn-sec">Додати в колекцію</button></div>
        <div class="div">
            <table class="table-edit" style="width: 60%;">
                <thead>
                <tr>
                    <th> </th>
                    <th>Обліковий номер</th>
                    <th>Назва експонату</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </td>
                    <td>№049035</td>
                    <td>Картина “Пробудження”</td>
                    <td class="last-td d-flex justify-content-end align-items-baseline">
                        <button type="button" class="btn-sec" data-bs-toggle="modal" data-bs-target="#view">
                            Переглянути</button>
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
