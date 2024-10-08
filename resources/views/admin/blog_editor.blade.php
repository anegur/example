<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Персональная страничка</title>

        @vite(['resources/css/style.css', 
        'resources/css/style_be.css', 
        'resources/js/date_viewer.js'])

    </head>

    <body>
        
    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">
                    Сайт моей персоны
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
            <h1>Редактор Блога</h1>
            <div class="container">
            <h2 class="divider">Создание записи</h2>
            <form class="form" method="post" action="/admin/blog_editor/store" enctype="multipart/form-data">
                @csrf
                
                <div class="post-data">
                    <div class="input-data">
                        <div class="form-block">
                            <label for="title" class="form-block-label">Тема</label>
                            <input type="text" id="title" name="title" placeholder="Напишите тему...">
                            {!! isset($errors_data) && $errors_data['title'] ? '<span>' . $errors_data['title'] . '</span>' : '' !!}
                        </div>

                        <div class="form-block">
                            <label for="message" class="form-block-label">Текст</label>
                            <textarea id="message" name="message" rows="4" cols="200" placeholder="Напишите текст..."></textarea>
                            {!! isset($errors_data) && $errors_data['message'] ? '<span>' . $errors_data['message'] . '</span>' : '' !!}
                        </div>
            
                        <div class="form-block">
                            <label for="author" class="form-block-label">Автор</label>
                            <input type="text" id="author" name="author" placeholder="Напишите текст..."></input>
                            {!! isset($errors_data) && $errors_data['author'] ? '<span>' . $errors_data['author'] . '</span>' : '' !!}
                        </div>
                    </div>

                    <div class="form-block">
                        <label for="image" class="form-block-label">Картинка</label>
                        <input class="image-import-block" type="file" name="image" required>
                    </div>
                </div>

                <input type="submit" value="Опубликовать запись" id="submit">
                <input type="reset" value="Очистить">

                <div class="errors">
                {!! $error_list ?? '' !!}
                </div>

            </form>

            @isset($is_post)
                    @if($is_post==true)
                    <div class="green-block">
                    <p>Запись опубликована</p>
                    </div>
                    @else
                    <div class="red-block">
                    <p>Ошибка при публикации записи!</p>
                    </div>
                    @endif
                @endisset
            </div>
        </div>
    </body>
</html>