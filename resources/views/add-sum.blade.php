@extends('layouts')

@section('title', 'Добавление резюме')

@section('page-content')
    <form class="add-sum @if($errors->any()) {{'form-invalid'}} @endif"
          action="{{route('addsum')}}"
          method="post"
          autocomplete="off">
        @csrf
        <h2 class="add-sum__title">Добавить резюме</h2>
        <div class="add-sum__group @error('title') form__item--invalid @enderror">
            <p class="add-sum__label">Профессия:</p>
            <input type="text" id="sum-name" name="sum-name" placeholder="Введите наименование профессии">
            @error('title')
                <span class="form__error">Введите наименование профессии</span>
            @enderror
        </div>
        <div class="add-sum__group">
            <p class="add-sum__label">Категория:</p>
            <select id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="add-sum__group @error('description') form__item--invalid @enderror">
            <p class="add-sum__label">Описание:</p>
            <textarea id="description" name="description" placeholder="Расскажите о себе"></textarea>
            @error('description')
                <span class="form__error">Расскажите о себе</span>
            @enderror
        </div>
        <div class="add-sum__group @error('price') form__item--invalid @enderror">
            <p class="add-sum__label">Желаемая зарплата:</p>
            <input type="text" id="sum-sal" name="sum-sal">
            @error('price')
                <span class="form__error">Укажите желаемую зарплату</span>
            @enderror
        </div>
        <button type="submit" class="form-submit">Добавить резюме</button>
    </form>
@endsection
