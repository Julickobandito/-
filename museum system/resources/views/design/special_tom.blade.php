@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Облік спеціальної інвентарної книги. Том 1</h1>
            <a href="/special_process" class="btn-main">Створити новий запис</a>
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
                    <td class="last-td d-flex justify-content-end">
                        <a href="/special_record" class="btn-sec">Переглянути</a>
                    </td>
                </tr>
                <tr class="table-row">
                    <td>№00002</td>
                    <td>Картина “Цар-Колос”</td>
                    <td>25.04.2022</td>
                    <td>28.04.2023</td>
                    <td class="last-td d-flex justify-content-end">
                        <a href="/special_record" class="btn-sec">Переглянути</a>
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
@endsection
