@extends('layouts.header+footer')
@section('content')
    <div class="wrapper">
        <h1 class="title">Кабінет адміністратора</h1>
        <h2 class="subtitle">Функціонал</h2>
        <div class="functional-cards">
            <div class="functional-card museums">
                <img src="/img/museum_logo_dark.svg" alt="income_book">
                <h3 class="subtitle-2">Облік музеїв</h3>
                <p>Реєстрація, редагування</p>
                <a href="/museums" class="btn-sec">Перейти</a>
            </div>
            <div class="functional-card staff">
                <img src="/img/staff.svg" alt="income_book">
                <h3 class="subtitle-2">Облік працівників</h3>
                <p>Реєстрація, редагування, деактивація</p>
                <a href="/staff" class="btn-sec">Перейти</a>
            </div>
        </div>
    </div>
@endsection
