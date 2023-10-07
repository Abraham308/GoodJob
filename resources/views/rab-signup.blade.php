@extends('layouts')

@section('title', 'Регистрация для работодателей')

@section('page-content')
        <form class="sign-form @if($errors->any()) {{'form-invalid'}} @endif"
                action="{{route('rabsignup')}}"
                method="post"
                autocomplete="off">
            @csrf
            <h2 class="sign">Регистрация для работодателей</h2>
            <div class="form-group @error('name') form__item--invalid @enderror">
                <label for="name">Введите название организации:</label>
                <input type="name" id="name" name="name" placeholder="Ваша организация">
                @error('name')
                    <span class="form__error">Введите название организации</span>
                @enderror
            </div>
            <div class="form-group @error('email') form__item--invalid @enderror">
                <label for="email">Введите почту организации:</label>
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
