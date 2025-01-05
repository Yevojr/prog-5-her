<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Add game
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>

    @auth

        @php
            $visits = 3 - auth()->user()->login_counter;
        @endphp

        @if($visits >=0)
            <p>You need to visit {{$visits}} more time(s) to be able to add games to the list.</p>
        @else
            <form action="{{route('games.store')}}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                @include('games._game-form')


                <div class="form-div-btn">
                    <a href="{{route('games.index')}}">Return to list</a>
                    <button type="submit" class="btn">Add game</button>
                </div>
            </form>
        @endif
    @else
        <p><a href="{{route('login')}}"></a> or <a href="{{route('register')}}">register</a>.</p>

    @endauth


</x-base-layout>

