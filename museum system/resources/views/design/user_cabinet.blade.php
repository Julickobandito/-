@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <h1 class="title">Кабінет обліковця</h1>
        <h2 class="subtitle">Функціонал</h2>
        <div class="functional-cards">
            <div class="functional-card">
                <img src="/img/exhibits_account.svg" alt="income_book">
                <h3 class="subtitle-2">Облік музейних предметів</h3>
                <p>Реєстрація предмета в облікових книгах</p>
                <a href="/income" class="btn-main">Зареєструвати</a>
            </div>
            <div class="functional-card">
                <img src="/img/income_book.svg" alt="income_book">
                <h3 class="subtitle-2">Книги надходження</h3>
                <p>Створення, редагування, фільтрація</p>
                <a href="#" class="btn-sec">Перейти</a>
            </div>
            <div class="functional-card">
                <img src="/img/inventary_book.svg" alt="inventory_book">
                <h3 class="subtitle-2" style="height: 60px;">Інвентарні книги</h3>
                <p>Створення, редагування, фільтрація</p>
                <a href="#" class="btn-sec">Перейти</a>
            </div>
            <div class="functional-card">
                <img src="/img/special_inventory_book.svg" alt="special_inventory_book">
                <h3 class="subtitle-2">Спеціальні інвентарні книги</h3>
                <p>Створення, редагування, фільтрація</p>
                <a href="#" class="btn-sec">Перейти</a>
            </div>
            <div class="functional-card">
                <img src="/img/draft.svg" alt="income_book">
                <h3 class="subtitle-2">Незавершена реєстрація</h3>
                <p>Переглянути поточні записи</p>
                <a href="#" class="btn-sec">Перейти</a>
            </div>
        </div>
    </div>

@endsection
