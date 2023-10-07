@extends('layouts')

@section('title', 'Восстановление пароля')

@section('page-content')
    <form class="auth-form" action="/forget-password" method="post">
        @csrf
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @else
        <h2 class="Auth">Восстановление пароля</h2>
        <div class="form-group">
            <label for="email">Введите почту:</label>
            <input type="email" id="email" name="email" placeholder="example@mail.com" value="{{old('email')}}">
        </div>
            <button type="submit" class="button">Отправить</button>
        @endif
    </form>
@endsection
