<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Персональная страничка </title>

    @vite(['resources/css/style.css', 'resources/css/style_interests.css'])
    @vite(['resources/js/date_viewer.js', 'resources\js\interests.js']) 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/js/interests.js')
    
</head>

<body>
    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">Сайт моей персоны</li>
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><a href="{{ url('/about') }}">Обо мне</a></li>
                <li class="dropdown"><a href="{{ url('/interests') }}" class="dropdown-toggle">Интересы</a>
                    <ul class="dropdown-content">
                        <li><a href="{{ url('/interests#hobby') }}">Хобби</a></li>
                        <li><a href="{{ url('/interests#books') }}">Любимые книги</a></li>
                        <li><a href="{{ url('/interests#games') }}">Любимые игры</a></li>
                        <li><a href="{{ url('/interests#anime') }}">Любимые японские мультики</a></li>
                        <li><a href="{{ url('/interests#weather') }}">Любимая погода</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/education') }}">Учёба</a></li>
                <li><a href="{{ url('/photo_album') }}">Фотоальбом</a></li>
                <li><a href="{{ url('/contact') }}">Контакт</a></li>
                <li><a href="{{ url('/test') }}">Тест по дисциплине</a></li>
                <li><a href="{{ url('/history') }}">История</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="main_content">
            <h1>МОИ ИНТЕРЕСЫ</h1>

            @foreach ($interests as $interest)
                <section id=" {{$interest['Interest_id']}}">
                    <h2>{{$interest['Interest_name']}}</h2>
                    <p>
                        {!! $interest['Text'] !!}
                    </p>
                </section>
            @endforeach
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Моя Персональная Страница</p>
    </footer>

    <!-- <script src="{{ asset('JScode/drop_menu.js') }}"></script> -->
</body>

</html>