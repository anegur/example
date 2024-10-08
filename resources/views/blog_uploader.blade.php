<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Персональная страничка</title>

        @vite(['resources/css/style.css', 
        'resources/css/style_bu.css', 
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
                <!-- <li><a href="{{ route('education') }}">Учёба</a></li> -->
                <li><a href="{{ route('photo_album') }}">Фотоальбом</a></li>
                <li><a href="{{ route('contact') }}">Контакт</a></li>
                <li><a href="{{ route('test') }}">Тест по дисциплине</a></li>
                <li><a href="{{ route('guest_book') }}">Гостевая книга</a></li>
                <li><a href="{{ route('blog_editor') }}">Редактор блога</a></li>
                <li><a href="{{ route('my_blog') }}">Блог</a></li>
                <li><a href="{{ route('blog_uploader') }}">Загрузка блога</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
        <main>
            <div class="page-content">
                <h1>Загрузка сообщений Блога</h1>
                <div class="container">
                <h2 class="divider">Форма загрузки</h2>
                <form class="form" method="post" action="/blog_uploader/upload" enctype="multipart/form-data">
                    @csrf
                    <div class="form-block">
                    <label for="message" class="form-block-label">Записи блога  (.csv)</label>
                    <input type="file" name="file">
                    </div>

                    <input type="submit" value="Загрузить записи" id="submit">

                </form>

                @isset($is_file)
                        @if($is_file==true)
                        <div class="green-block">
                        <p>Файл успешно загружен</p>
                        </div>
                        @else
                        <div class="red-block">
                        <p>Ошибка при загрузке файла!</p>
                        </div>
                        @endif
                    @endisset
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Моя Персональная Страница</p>
        </footer>
    </body>
</html>