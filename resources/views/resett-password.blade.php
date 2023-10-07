@extends('rablayout')

@section('title', 'Новый пароль')

@section('page-content')
    <form class="form container" action="/resett-password" method="post"> <!-- form--invalid -->
        @csrf
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <h2>Сбросить пароль</h2>
        <div class="form__item"> <!-- form__item--invalid -->
            <label for="email">Email<sup>*</sup></label>
            <input id="email" type="text" name="email" readonly value="{{$email}}">
        </div>
        <div class="form__item"> <!-- form__item--invalid -->
            <label for="token">Токен <sup>*</sup></label>
            <input id="token" type="text" name="token" readonly value="{{$token}}">
        </div>
        <div class="form__item"> <!-- form__item--invalid -->
            <label for="email">Пароль <sup>*</sup></label>
            <input id="email" type="password" name="password" placeholder="Введите e-mail">
            <span class="form__error">Введите e-mail</span>
        </div>
        <div class="form__item form__item--last">
            <label for="password">Подтверждение Пароля <sup>*</sup></label>
            <input id="password" type="password" name="password_repeat" placeholder="Введите пароль">
            <span class="form__error">Введите пароль</span>
        </div>
        <button type="submit" class="button">Сбросить</button>
    </form>
@endsection
