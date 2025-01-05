<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Add a category
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>


    <form action="{{route('categories.store')}}" method="POST" class="form">
        @csrf

        <div class="form-div-input">
            <label for="name">Category name:</label>
            <div class="form-error">
                <input type="text" name="name" id="name" class="form-input">
                @error('name')
                <span>{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-div-btn">
            <a href="{{route('categories.index')}}">Return to categories list</a>
            <button type="submit" class="btn">Add Category</button>
        </div>

    </form>

</x-base-layout>

