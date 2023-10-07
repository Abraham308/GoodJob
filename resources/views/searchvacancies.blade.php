@extends('layouts')

@section('title', 'Поиск вакансий')

@section('page-content')
    <section>
        <div class="category-links">
            @foreach($categories as $category)
                <a href="{{route('category-search', ['id' => $category->id])}}">{{$category->title}}</a>
            @endforeach
        </div>
        <div class="vertical-line"></div>
        @if($vacancies->isNotEmpty())
        <div class="vacancies">
            @foreach($vacancies as $vacancy)
                <x-vacancy :vacancy="$vacancy"></x-vacancy>
            @endforeach
        </div>
        @else
            <h2 class="null-result">Результатов поиска по запросу нет</h2>
        @endif
    </section>
@endsection
