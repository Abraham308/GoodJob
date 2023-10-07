<div class="res">
    <a href="{{route('profilesum', ['id' => $summary->id]) }}">{{$summary->title}}</a>
    <a href="{{ route('summary.edit', ['id' => $summary->id]) }}" class="res-button" style="text-decoration: none">Изменить</a>
    <form class="res-delete" action="{{ route('summary.delete', ['id' => $summary->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
</div>
