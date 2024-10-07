<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    @vite(['resources/css/style.css', 'resources/css/style_gb.css', 'resources/js/date_viewer.js'])
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
                <li><a href="{{ route('gb_uploader') }}">Загрузка ГК</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Гостевая книга</h1>
        <div class="main_content">

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('guest_book.store') }}" method="POST">
                @csrf
                <br>
                <input type="text" name="fullname" placeholder="ФИО (Фамилия Имя Отчество)" required value="{{ old('fullname') }}">
                <br>
                <input type="email" name="email" placeholder="E-mail" required value="{{ old('email') }}">
                <br>
                <textarea name="message" placeholder="Текст отзыва" required rows="7" cols="50">{{ old('message') }}</textarea>
                <br>
                <button type="submit">Отправить</button>
            </form>

            @isset($messages)
                @if(count($messages) > 0)
                    <table class="reviews">
                        <thead>
                            <tr>
                                <th scope="col">ФИО</th>
                                <th scope="col">Почта</th>
                                <th scope="col">Отзыв</th>
                                <th scope="col">Дата</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ $message['fullname'] }}</td>
                                    <td>{{ $message['email'] }}</td>
                                    <td>{{ $message['message'] }}</td>
                                    <td>{{ $message['datetime'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="info-block">
                        <p>Отзывов пока нет</p>
                    </div>
                @endif
            @else
                <div class="info-block">
                    <p>Отзывов пока нет</p>
                </div>
            @endisset
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Моя Персональная Страница</p>
    </footer>
</body>
</html>
