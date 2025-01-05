<x-base-layout>
    {{--        page title here--}}
    <x-slot:title>
        Admin Page
    </x-slot:title>

    {{--        css link here--}}
    <x-slot name="css">

    </x-slot>

    <h1>Manage Lists</h1>

    <section class="admin-lists">

        <div class="games-list">
            <h2>Games</h2>
            <table class="game-table">
                <thead>
                <tr>Name</tr>
                <tr>Visibility</tr>
                <tr>Actions</tr>
                </thead>

                <tbody>
                @foreach($games as $game)
                   <tr>
                       <td>{{$game->name}}</td>
                       <td>{{$game->visibility ? 'Visible' : 'Hidden'}}</td>
                       <td>
                           <section class="admin-action">
                               <form action="{{route('games.visibility', $game->id)}}" method="POST" style="display: inline">
                                   @csrf
                                   <button type="submit">{{$game->visibility ? 'Hide' : 'Show'}}</button>
                               </form>

                               <a href="{{route('games.edit', $game->id)}}" style="display: inline">
                                   <button>Edit</button>
                               </a>


                               <form action="{{route('games.destroy', $game->id)}}" method="POST" style="display: inline">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" onclick="return confirm('Are you sure you want to delete this game entry from the list?')">Delete</button>
                               </form>

                           </section>
                       </td>

                   </tr>
                @endforeach

                </tbody>

            </table>


        </div>

        <div class="series-list">
            <h2>Series</h2>
            <table>
                <thead>
                <tr>Name</tr>
                <tr>Actions</tr>
                </thead>

                <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td>{{$serie->name}}</td>
                        <td>
                            <section>
                                <form action="{{route('series.destroy', $serie->id)}}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this series entry from the list?')">Delete</button>
                                </form>
                            </section>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="categories-list">
            <h2>Categories</h2>
            <table>
                <thead>
                <tr>Name</tr>
                <tr>Actions</tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <section>
                                <form action="{{route('categories.destroy', $category->id)}}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this category entry from the list?')">Delete</button>
                                </form>
                            </section>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </section>

</x-base-layout>

