<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Series List
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>


    <h1>Series</h1>

    <div class="category-list">

        @foreach($series as $serie)
            <a href="{{route('games.index')}}">
                <h3>{{$serie->name}}</h3>
            </a>
        @endforeach
    </div>
</x-base-layout>

