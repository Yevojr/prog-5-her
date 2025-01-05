<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{$css}}
    @vite('resources/css/main.css')
    @vite('resources/js/main.js')
    <title>{{$title ?? 'Default Title'}}</title>
</head>
<body>

<nav class="navbar">
    <a href="{{route('home')}}">Home</a>
    @if(auth()->check())
        <a href="{{route('games.create',['userId' => $user ?? auth()->id() ?? 0])}}">Add game</a>
    @endif
    <a href="{{route('categories.index')}}">Categories list</a>
    <a href="{{route('series.index')}}">Series list</a>

    @if(auth()->check() && auth()->user()->is_admin)
        <a href="{{route('categories.create',['userId' => $user ?? auth()->id() ?? 0])}}">Add Category</a>
        <a href="{{route('series.create',['userId' => $user ?? auth()->id() ?? 0])}}">Add Series</a>

    @endif

    @if(Auth::check())
            <a href="{{route('dashboard')}}">Dashboard</a>
    @else
            <a href="{{route('login')}}">Login</a>
    @endif
</nav>


<main>
    {{$slot}}
</main>

<footer>

    <div>
        <h4>Contact</h4>
        <ul>
            <li><a href="#">Email</a></li>
            <li><a href="#">Call</a></li>
        </ul>
    </div>
    <div>
        <h4>Creator's socials</h4>
        <div class="socials">
            <a href="#" class="social-link">Facebook</a>
            <a href="#" class="social-link">Twitter / X</a>
            <a href="#" class="social-link">Tiktok</a>
            <a href="#" class="social-link">Instagram</a>
            <a href="#" class="social-link">Bluesky</a>
        </div>
    </div>
</footer>
</body>
</html>
