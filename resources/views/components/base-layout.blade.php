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

</nav>


<main>
    {{$slot}}
</main>

<footer>
    <div>
        <h4>Quick nav:</h4>
        <ul>
            <li><a href="">Add game</a></li>
            <li><a href="">Categories list</a></li>
            <li><a href="">Series list</a></li>
        </ul>
    </div>
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
