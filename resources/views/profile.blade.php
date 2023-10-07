@extends('layouts')

@section('title', 'Профиль')

@section('page-content')
    <div class="containerr">
        <div class="logoo">
            <span style="font-size: 36px; font-weight: bold;">Мои резюме</span>
        </div>
    </div>
    <div class="ress">
        @foreach($summaries as $summary)
            <x-summaryprofile :summary="$summary"></x-summaryprofile>
        @endforeach
    </div>
@endsection
