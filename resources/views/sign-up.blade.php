@extends('layouts')

@section('title', 'Регистрация')

@section('page-content')
        <form class="sign-form @if($errors->any()) {{'form-invalid'}} @endif"
              action="{{route('signup')}}"
              method="post"
              autocomplete="off">
            @csrf
            <h2 class="sign">Регистрация</h2>
            <div class="form-group @error('name') form__item--invalid @enderror">
                <label for="name">Введите имя:</label>
                <input type="name" id="name" name="name" placeholder="Ваше имя">
                @error('name')
                    <span class="form__error">Введите имя</span>
                @enderror
            </div>
            <div class="form-group @error('email') form__item--invalid @enderror">
                <label for="email">Введите почту:</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com">
                @error('email')
                    <span class="form__error">Введите email</span>
                @enderror
            </div>
            <div class="form-group @error('password') form__item--invalid @enderror">
                <label for="password">Введите пароль:</label>
                <input type="password" id="password" name="password" placeholder="******">
                @error('password')
                    <span class="form__error">Введите пароль</span>
                @enderror
            </div>
            <div class="form-group @error('contacts') form__item--invalid @enderror">
                <label for="contact">Введите телефон:</label>
                <input type="contact" id="contact" name="contacts" placeholder="Ваш телефон">
                @error('contacts')
                    <span class="form__error">Введите телефон</span>
                @enderror
            </div>
            <button type="submit">Регистрация</button>
        </form>

@endsection
