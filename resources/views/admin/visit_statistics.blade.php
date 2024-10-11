<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    @vite(['resources/css/style.css', 'resources/css/style_visit_stat.css', 'resources/js/date_viewer.js'])
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
            <h1>Статистика посещений</h1>
            <div class="container">
                <h2 class="divider">Данные пользователей</h2>
                <div class="stats">
                    <table class="labtable">
                        <thead>
                            <tr>
                                <th>Дата и время</th>
                                <th>Web-страница</th>
                                <th>IP-адрес</th>
                                <th>Имя хоста</th>
                                <th>Название браузера</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statistics as $statistic)
                                <tr>
                                    <td>{{ $statistic->visited_at }}</td>
                                    <td>{{ $statistic->web_page }}</td>
                                    <td>{{ $statistic->ip_address }}</td>
                                    <td>{{ $statistic->host_name }}</td>
                                    <td>{{ $statistic->browser_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $statistics->links() }}
                </div>
            </div>
    </main>

    <footer>
        <p>&copy; 2023 Моя Персональная Страница</p>
    </footer>
</body>

</html>