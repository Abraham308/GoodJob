@extends('rablayout')

@section('title', 'Главная')

@section('page-content')
    <section>
        <div class="category-links">
            @foreach($categories as $category)
                <a href="{{route('categoryy-search', ['id' => $category->id])}}">{{$category->title}}</a>
            @endforeach
        </div>
        <div class="vertical-line">  </div>
        <div class="vacancies">
            @foreach($summaries as $summary)
                <x-summary :summary="$summary"></x-summary>
            @endforeach
        </div>
    </section>
@endsection
