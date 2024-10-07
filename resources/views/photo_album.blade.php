<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Персональная страничка</title>
    @vite(['resources/css/style.css', 'resources/css/style_album.css'])
    @vite(['resources/js/date_viewer.js', 'resources/js/photo_album.js']) 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">Сайт моей персоны</li>
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><a href="{{ route('about') }}">Обо мне</a></li>
                <li class="dropdown">
                    <a href="{{ route('interests') }}" class="dropdown-toggle">Интересы</a>
                    <ul class="dropdown-content">
                        <li><a href="{{ route('interests') }}#hobby">Хобби</a></li>
                        <li><a href="{{ route('interests') }}#books">Любимые книги</a></li>
                        <li><a href="{{ route('interests') }}#games">Любимые игры</a></li>
                        <li><a href="{{ route('interests') }}#anime">Любимые японские мультики</a></li>
                        <li><a href="{{ route('interests') }}#weather">Любимая погода</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('education') }}">Учёба</a></li>
                <li><a href="{{ route('photo_album') }}">Фотоальбом</a></li>
                <li><a href="{{ route('contact') }}">Контакт</a></li>
                <li><a href="{{ route('test') }}">Тест по дисциплине</a></li>
                <li><a href="{{ route('history') }}">История</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="column">
            </div>

            <div class="column center">
                <h1>Фотоальбом</h1>
                <div id="photo-album" class="photo-album">
                    @foreach($photos as $photo)
                    <div class="cell">
                        <img class="photo" src="{{ asset('images/' . $photo['name']) }}" alt="{{ $photo['caption'] }}" title="{{ $photo['caption'] }}">
                        <div>{{ $photo['caption'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="column">
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Моя Персональная Страница</p>
    </footer>
</body>
</html>

