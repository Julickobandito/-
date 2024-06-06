@extends('layouts.header+footer')
@section('content')
    <div class="container-fluid">
        <div class="form auth-form">
            <div class="h1-wrapper">
                <h1 class="title">Увійти</h1>
            </div>
            <p class="auth-par">Уведіть логін та пароль, щоб увійти в систему.</p>
            <form id="loginForm" action="#" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Логін</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="text" placeholder="Уведіть логін" required>
                    <div class="invalid-feedback">
                        Будь ласка, заповніть поле.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Уведіть пароль" required>
                    <div class="invalid-feedback">
                        Будь ласка, заповніть поле.
                    </div>
                </div>
                <a href="#" class="link-form">Забули пароль?</a>

                <button class="btn-main auth" type="button" onclick="validateForm()">Увійти</button>
            </form>
        </div>
    </div>

@endsection

