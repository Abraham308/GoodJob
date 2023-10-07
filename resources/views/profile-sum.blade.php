@extends('layouts')

@section('title', 'Страница резюме')

@section('page-content')
    <div class="resume-header">Резюме</div>
    <div class="resume">
        <h2 class="resume-title">{{$summary->title}}</h2>
        <div class="resume-info">
            <div class="resume-name">Имя: {{$summary->applicant->name}}</div>
            <div class="resume-phone">Телефон: {{$summary->applicant->contacts}}</div>
            <div class="resume-salary">Желаемая зарплата в месяц: {{$summary->price}}</div>
        </div>
        <div class="resume-description">
            <p>Описание:</p>
            <p>{{$summary->description}}</p>
        </div>
    </div>
@endsection
