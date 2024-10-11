<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    @vite(['resources/css/style.css', 'resources/css/style_gb_uploader.css', 'resources/js/date_viewer.js'])
</head>

<body>
    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">
                    <span>С</span><span>а</span><span>й</span><span>т</span> <span>м</span><span>о</span><span>е</span><span>й</span> <span>п</span><span>е</span><span>р</span><span>с</span><span>о</span><span>н</span><span>ы</span>
                </li>
                <li><a href="{{ route('guest_book') }}">Гостевая книга</a></li>
                <li><a href="{{ route('gb_uploader') }}">Загрузка ГК</a></li>
                <li><a href="{{ route('blog_editor') }}">Редактор блога</a></li>
                <li><a href="{{ route('my_blog') }}">Блог</a></li>
                <li><a href="{{ route('blog_uploader') }}">Загрузка блога</a></li>
                <li><a href="{{ route('visit_stat') }}">Статистика посещений</a></li>
                <!-- <li><a href="{{ route('login') }}">Вход/Регистрация</a></li> -->
                <li><a class="leave-btn" href="/logout">Выйти</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Загрузка гостевой книги</h1>
        <div class="main_content">

        <h2 class="divider">Форма загрузки</h2>
          <form class="form" method="post" action="/admin/gb_uploader/upload" enctype="multipart/form-data">
            @csrf
            <div class="form-block">
              <label for="message" class="form-block-label">Гостевая книга</label>
              <input type="file" name="file" required>
            </div>

            <input type="submit" value="Загрузить" id="submit">

          </form>

          @isset($gb_file)
                @if($gb_file==true)
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
    </main>

    <footer>
        <p>&copy; 2023 Моя Персональная Страница</p>
    </footer>
</body>
</html>
