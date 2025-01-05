<x-base-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>

    <x-slot name="css">

    </x-slot>

    <div class="home-title">
        <h1 class="title">Welcome to Yev's game list website!</h1>
    </div>

    <div class="home-explanation">
        <h2>Have fun viewing all the games on the list!</h2>
        <br>
        <h3><a href="{{route('games.index')}}">View</a> game list here.</h3>
    </div>

</x-base-layout>
