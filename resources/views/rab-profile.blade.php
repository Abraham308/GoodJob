@extends('rablayout')

@section('title', 'Профиль работодателя')

@section('page-content')
    <div class="containerrr">
        <div class="logooo">
            <span style="font-size: 36px; font-weight: bold;">Мои вакансии</span>
        </div>
    </div>
    <div class="vacs">
        @foreach($vacancies as $vacancy)
            <x-vacancyprofile :vacancy="$vacancy"></x-vacancyprofile>
        @endforeach
    </div>
@endsection
