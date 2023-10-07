@extends('layouts')

@section('title', 'Авторизация для работодателей')

@section('page-content')
        <form class="auth-form"
              action="{{route('rablogin')}}"
              method="post">
            @csrf
            <h2 class="Auth">Авторизация для работодателей</h2>
            <div class="form-group @error('email') form__item--invalid @enderror">
                <label for="email">Введите почту:</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com">
                @error('email')
                    <span class="form__error">Введите email</span>
                @enderror
            </div>
            <div class="form-group @error('email') form__item--invalid @enderror">
                <label for="password">Введите пароль:</label>
                <input type="password" id="password" name="password" placeholder="******">
                @error('password')
                    <span class="form__error">Введите пароль</span>
                @enderror
            </div>
            <div class="form__item @error('auth_error') form__item--invalid @enderror">
                @error('auth_error')
                <span class="form__error">{{$message}}</span>
                @enderror
            </div>
            <button type="submit">Вход</button>
            <a href="{{route('forgettPasswordPage')}}" class="forgot-password">Забыли пароль?</a>
        </form>
@endsection
