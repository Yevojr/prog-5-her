<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>

    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>

    <h1>List of Games</h1>

    <form action="{{route('games.search')}}" method="GET">
        @csrf
        <input type="text" name="query" placeholder="Search...">
        <select name="series_id">
            <option value="">Choose Series</option>
            @foreach($series as $serie)
                <option value="{{$serie->id}}">{{$serie->name}}</option>
            @endforeach
        </select>
        <button type="submit">Search</button>


    </form>


    <div class="games-list">
        @foreach($games as $game)
            <h2>{{$game->name}}</h2>
            <img src="{{asset('storage/' . $game->image)}}" alt="{{$game->name}}">
            <h3>Series: {{$game->series->name}}</h3>
            <a class="game-details" href="{{route('games.show', ['id' => $game->id])}}">Detailed view</a>
        @endforeach
    </div>
</x-base-layout>

