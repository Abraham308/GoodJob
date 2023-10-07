@extends('rablayout')

@section('title', 'Страница вакансии')

@section('page-content')
    <div class="vacancy-header">Вакансия</div>
    <div class="vacancy">
        <h2 class="vacancy-title">{{$vacancy->title}}</h2>
        <div class="vacancy-info">
            <div class="vacancy-name">Имя: {{$vacancy->employer->name}}</div>
            <div class="vacancy-phone">Телефон: {{$vacancy->employer->contacts}}</div>
            <div class="vacancy-salary">Зарплата в месяц: {{$vacancy->price}}</div>
        </div>
        <div class="vacancy-description">
            <p>Описание:</p>
            <p>{{$vacancy->description}}</p>
        </div>
    </div>
@endsection
