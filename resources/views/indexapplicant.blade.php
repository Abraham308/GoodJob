@extends('layouts')

@section('title', 'Главная')

@section('page-content')
    <section>
        <div class="category-links">
            @foreach($categories as $category)
                <a href="{{route('category-search', ['id' => $category->id])}}">{{$category->title}}</a>
            @endforeach
        </div>
        <div class="vertical-line">  </div>
        <div class="vacancies">
            @foreach($vacancies as $vacancy)
                <x-vacancy :vacancy="$vacancy"></x-vacancy>
            @endforeach
        </div>
    </section>
@endsection
