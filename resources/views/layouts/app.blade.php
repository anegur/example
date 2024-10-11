<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Моя Персональная Страница')</title>
    @vite(['resources/css/style.css', 'resources/js/app.js']) {{-- Путь к вашим стилям и скриптам --}}
</head>
<body>
    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">
                    <span>С</span><span>а</span><span>й</span><span>т</span> <span>м</span><span>о</span><span>е</span><span>й</span> <span>п</span><span>е</span><span>р</span><span>с</span><span>о</span><span>н</span><span>ы</span>
                </li>
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><a href="{{ route('about') }}">Обо мне</a></li>
                <li><a href="{{ route('interests') }}">Интересы</a></li>
                <li><a href="{{ route('education') }}">Учёба</a></li>
                <li><a href="{{ route('photo_album') }}">Фотоальбом</a></li>
                <li><a href="{{ route('contact') }}">Контакт</a></li>
                <li><a href="{{ route('test') }}">Тест по дисциплине</a></li>
                <li><a href="{{ route('guest_book') }}">Гостевая книга</a></li>
                <li><a href="{{ route('visit_stat') }}">Статистика посещений</a></li>
                <li><a href="{{ route('login') }}">Вход/Регистрация</a></li> {{-- Ссылка на страницу входа/регистрации --}}
                <li id="clock"></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content') {{-- Основной контент страниц --}}
    </main>

    <footer>
        <p>&copy; 2023 Моя Персональная Страница</p>
    </footer>
</body>
</html>
