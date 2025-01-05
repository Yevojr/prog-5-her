<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Add game
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>

    <form action="{{route('games.update', $game->id)}}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('games._game-form')


        <div class="form-div-btn">
            <a href="{{route('admin.index')}}">Return to lists</a>
            <button type="submit" class="btn">Update</button>
        </div>
    </form>

</x-base-layout>

