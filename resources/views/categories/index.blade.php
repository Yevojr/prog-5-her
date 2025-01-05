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
            <a href="_{{route('categories.show', $category->id)}}">
                <h3>{{$category->name}}</h3>
            </a>
        @endforeach
    </div>

</x-base-layout>

