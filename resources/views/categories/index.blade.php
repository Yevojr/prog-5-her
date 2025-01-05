<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Categories List
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>

    <h1>Categories</h1>

    <div class="category-list">

        @foreach($categories as $category)
            <a href="{{route('games.index')}}">
                <h3>{{$category->name}}</h3>
            </a>
        @endforeach
    </div>
    @if(auth()->check() && auth()->user()->is_admin)
        <a href="{{route('categories.create', ['userId' => $user ?? auth()->id() ?? 0])}}">Add a new category</a>

    @endif


</x-base-layout>

