<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Персональная страничка</title>

    @vite([
    'resources/css/style.css',
    'resources/css/style_admpanel.css',
    'resources/js/date_viewer.js'
])

</head>

<body>

    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">
                    Сайт моей персоны
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
        <div class="page-content">
            <h1>Панель администратора</h1>
            <div class="container">
                <h2 class="divider">Опции</h2>
                <div class="options">
                    <a href="/admin/visit_stat" class="opt">
                        <h1>Статистика посещений</h1>
                        <p>Нажмите, чтобы посмотреть информацию о посещаемости страниц сайта</p>
                    </a>
                    <a href="/admin/teststat" class="btn btn-primary disabled" id="testButton">Просмотр теста</a>
                        <h1>Статистика тестирований</h1>
                        <p>Нажмите, чтобы посмотреть информацию о результатах теста пользователя</p>
                    </a>
                    <a href="/admin/gb_uploader" class="opt">
                        <h1>Загрузка ГК</h1>
                        <p>Нажмите, чтобы загрузить данные для гостевой книжки</p>
                    </a>
                    <a href="/admin/blog_editor" class="opt">
                        <h1>Редактор блога</h1>
                        <p>Нажмите, чтобы добавить новые статьи в блог</p>
                    </a>
                </div>
            </div>
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