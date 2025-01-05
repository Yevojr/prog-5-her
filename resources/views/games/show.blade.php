<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Game details
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>

    <h1>{{$game->name}}</h1>

    <div class="game-container">
        <div class="game-info">

            <div class="game-info-img">
                <img src="{{asset('storage/' . $game->image)}}" alt="{{$game->name}}">
            </div>
            <div class="game-info-text">
                <h3>Release date: {{\Carbon\Carbon::parse($game->release_date)->format('d-m-Y')}}</h3>
            </div>
            <div>
                <h3>Series: {{$series->name}}</h3>
            </div>
            <div>
                <h3>Category: {{$category->name}}</h3>
            </div>

        </div>
    </div>

</x-base-layout>

