<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Персональная страничка</title>

        @vite(['resources/css/style.css', 
        'resources/css/style_index.css', 
        'resources/js/date_viewer.js'])

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
                <li class="dropdown"><a href="{{ route('interests') }}" class="dropdown-toggle">Интересы</a>
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
                <li><a href="{{ route('guest_book') }}">Гостевая книга</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
        <main>
            <div class = "avatar">
                <img src="images/avatar.jpg" alt="Моя аватарка">
            </div>
            <div class = "main_content">
                <h1>Ларин Андрей Максимович</h1>
                <h2>Студент группы ПИ/б-21-1-о</h2>
                <p>Некоторое описание....
                </p>
                <div id="clock"></div>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Моя Персональная Страница</p>
        </footer>
        

        <!-- <script src="JScode/nav_page_loader.js"></script> -->
        <!-- <script src="JScode/drop_menu.js"></script> -->
        <!-- <script>
            updateHistory();
        </script> -->
        <form action="index/validate" method="post"></form>
    </body>
</html>