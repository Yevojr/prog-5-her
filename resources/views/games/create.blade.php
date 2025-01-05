<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Add game
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>

    <form action="{{route('games.store')}}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        @include('games._game-form')


        <div class="form-div-btn">
            <a href="{{route('games.index')}}">Return to list</a>
            <button type="submit" class="btn">Add game</button>
        </div>
    </form>

</x-base-layout>

