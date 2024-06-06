@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="form auth-form">
            <div class="h1-wrapper">
                <h1 class="title">Увійти</h1>
            </div>
            <p class="auth-par">Уведіть логін та пароль, щоб увійти в систему.</p>
            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Логін (E-mail)</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Уведіть логін" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Уведіть пароль" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a href="#" class="link-form">Забули пароль?</a>

                <button class="btn-main auth" type="submit" onclick="validateForm()">Увійти</button>
            </form>
        </div>
    </div>

@endsection

