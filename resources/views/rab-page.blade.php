@extends('layouts')

@section('title', 'Работодателю')

@section('page-content')
    <div class="main-content">
        <h1 class="main-heading">Разместите вакансию на GoodJob.ru</h1>
        <p class="subheading">И находите сотрудников среди тех, кто хочет у вас работать.</p>
        <div class="buttons-container">
            <a href="{{route('rab-login')}}" class="button">Авторизация</a>
            <a href="{{route('rab-signup')}}" class="button">Регистрация</a>
        </div>
    </div>
@endsection
