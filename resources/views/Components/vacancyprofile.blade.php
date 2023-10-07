<div class="vac">
    <a href="{{route('profilevac', ['id' => $vacancy->id]) }}">{{$vacancy->title}}</a>
    <a href="{{ route('vacancy.edit', ['id' => $vacancy->id]) }}" class="vac-button" style="text-decoration: none">Изменить</a>
    <form class="vac-delete" action="{{ route('vacancy.delete', ['id' => $vacancy->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
</div>
