@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <div style="display: flex; justify-content: space-between; align-items: baseline">
            <h1 class="title">Незавершені процеси</h1>
        </div>
        <div class="div">
            <table class="table-edit" style="width: 80%;">
                <thead>
                <tr>
                    <th>Номер у книзі надходжень</th>
                    <th>Етап реєстрації</th>
                    <th>Обліковець</th>
                    <th>Останнє редагування</th>
                    <th> </th>
                </tr>
                </thead>
                <tr class="table-row">
                    <td>№00001</td>
                    <td>Книга надходжень</td>
                    <td>Петренко Петро Петрович</td>
                    <td>22.04.2022 14.25</td>
                    <td class="last-td d-flex justify-content-end">
                        <a href="/income_register" class="btn-sec">Продовжити</a>
                    </td>
                </tr>
                <tr class="table-row">
                    <td>№00002</td>
                    <td>Інвентарна книга</td>
                    <td>Петренко Петро Петрович</td>
                    <td>22.04.2022 14.25</td>
                    <td class="last-td d-flex justify-content-end">
                        <a href="/inventory_process" class="btn-sec">Продовжити</a>
                    </td>
                </tr>
                <tr class="table-row">
                    <td>№00003</td>
                    <td>Спеціальна інвентарна книга</td>
                    <td>Петренко Петро Петрович</td>
                    <td>22.04.2022 14.25</td>
                    <td class="last-td d-flex justify-content-end">
                        <a href="/special_process" class="btn-sec">Продовжити</a>
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
