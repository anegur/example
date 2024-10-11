<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Персональная страничка</title>

    @vite([
    'resources/css/style.css',
    'resources/css/style_login.css',
    'resources/js/date_viewer.js'
])

</head>

<body>

    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">
                    <span>С</span><span>а</span><span>й</span><span>т</span>
                    <span>м</span><span>о</span><span>е</span><span>й</span>
                    <span>п</span><span>е</span><span>р</span><span>с</span><span>о</span><span>н</span><span>ы</span>
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
                <li><a href="{{ route('visit_stat') }}">Статистика посещений</a></li>
                <li><a href="{{ route('authForm') }}">Вход/Регистрация</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Вход или Регистрация</h1>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row">
                <!-- Форма для входа -->
                <div class="col-md-6">
                    <h2>Вход</h2>
                    <form action="{{ route('loginConfirm') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" name="login" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </form>
                </div>

                <!-- Форма для регистрации -->
                <div class="col-md-6">
                    <h2>Регистрация</h2>
                    <form class="av-form" method="POST" action="/auth_form/register" enctype="multipart/form-data"  style="--i: 0">
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Полное имя</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" name="login" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Подтвердите пароль</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                    </form>
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