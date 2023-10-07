@extends('rablayout')

@section('title', 'Поиск резюме')

@section('page-content')
    <section>
        <div class="category-links">
            @foreach($categories as $category)
                <a href="{{route('categoryy-search', ['id' => $category->id])}}">{{$category->title}}</a>
            @endforeach
        </div>
        <div class="vertical-line"></div>
        @if($summaries->isNotEmpty())
            <div class="vacancies">
                @foreach($summaries as $summary)
                    <x-summary :summary="$summary"></x-summary>
                @endforeach
            </div>
        @else
            <h2 class="null-result">Результатов поиска по запросу нет</h2>
        @endif
    </section>
@endsection
