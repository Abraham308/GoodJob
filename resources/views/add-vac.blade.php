@extends('rablayout')

@section('title', 'Добавление резюме')

@section('page-content')
    <form class="add-vac @if($errors->any()) {{'form-invalid'}} @endif"
          action="{{route('addvac')}}"
          method="post"
          autocomplete="off">
        @csrf
        <h2 class="add-vac__title">Добавить вакансию</h2>
        <div class="add-vac__group @error('title') form__item--invalid @enderror">
            <p class="add-vac__label">Профессия:</p>
            <input type="text" id="vac-name" name="vac-name" placeholder="Введите наименование профессии">
            @error('title')
            <span class="form__error">Введите наименование профессии</span>
            @enderror
        </div>
        <div class="add-vac__group">
            <p class="add-vac__label">Категория:</p>
            <select id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="add-vac__group @error('description') form__item--invalid @enderror">
            <p class="add-vac__label">Описание:</p>
            <textarea id="description" name="description" placeholder="Расскажите об обязанностях"></textarea>
            @error('description')
            <span class="form__error">Расскажите об обязанностях</span>
            @enderror
        </div>
        <div class="add-vac__group @error('price') form__item--invalid @enderror">
            <p class="add-vac__label">Зарплата:</p>
            <input type="text" id="vac-sal" name="vac-sal">
            @error('price')
            <span class="form__error">Укажите желаемую зарплату</span>
            @enderror
        </div>
        <button type="submit" class="form-submit">Добавить вакансию</button>
    </form>
@endsection
