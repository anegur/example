<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Персональная страничка </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    @vite(['resources/css/style.css', 
    'resources/css/style_contact.css', 
    'resources/js/date_viewer.js', 
    'resources/js/history.js'])

</head>

<body>
    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">Сайт моей персоны</li>
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
                <li><a href="{{ route('history') }}">История</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Контакт</h1>
        <div class="main_content">
            <form id="contactForm" method="post" action="{{ route('contact.ValidateForm' )}}" class="test">
                <p>Здесь вы можете связаться со мной! <br></p>
                @csrf
                <div class="question">
                    <label for="fullName">Введите своё ФИО: </label> <br>
                    <!-- <input type="text" id="fullName" name="fullName"> -->
                    <input type="text" id="fullName" name="fullName" placeholder="Введите ваше имя" value="{{ old('fullName') }}">
                    <!-- <span class="error" id="fullName-error"></span> -->
                    @error('fullName')
                        <br><span class="error" id="fullName-error">{{ $message }}</span>
                    @enderror
                    <br>
                </div>

                <div class="question">
                    <label for="phone">Телефон: </label> <br>
                    <input type="tel" id="phone" name="phone" placeholder="Введите телефон" value="{{ old('phone') }}">
                    <!-- <span class="error" id="phone-error"></span><br> -->
                    @error('phone')
                        <br><span class="error" id="phone-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="question">
                    <label for="birthday">Дата рождения: </label> <br>
                    <input id="birthday" name="birthday" type="date" value="{{ old('birthday') }}">
                    <!-- <span class="error" id="birthday-error"></span><br> -->
                    @error('birthday')
                        <br><span class="error" id="birthday-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="question">
                    <label for="gender">Ваш гендер: </label> <br>
                    <input type="radio" name="gender" value="male"> Мужской
                    <input type="radio" name="gender" value="female"> Женский
                    <input type="radio" name="gender" value="kafel"> Кафель
                    <input type="radio" name="gender" value="parket"> Паркет
                    <input type="radio" name="gender" value="kvir"> Квир
                    <input type="radio" name="gender" value="meow-meow"> Мяу-мяу-мяу
                    <input type="radio" name="gender" value="pur"> Муррр
                    <input type="radio" name="gender" value="deer"> Олень_ка
                    <input type="radio" name="gender" value="other"> Другое
                    <br>
                    <!-- <span class="error" id="gender-error"></span> -->
                    @error('gender')
                        <br><span class="error" id="gender-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="question">
                    <label for="age">Возраст: </label>
                    <select id="age" name="age">
                        <option value="18">&lt;18</option>
                        <option value="18-25">18-25</option>
                        <option value="26-35">26-35</option>
                        <option value="36-45">36-45</option>
                        <option value="46-55">46-55</option>
                        <option value="56+">&gt;55</option>
                    </select> <br>
                    <!-- <span class="error" id="age-error"></span> -->
                    @error('age')
                        <br><span class="error" id="age-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="question">
                    <label for="email">Email: </label> <br>
                    <input type="email" name="email" id="email">
                    <!-- <span class="error" id="email-error"></span> -->
                    @error('email')
                        <br><span class="error" id="email-error">{{ $message }}</span>
                    @enderror
                    <br>
                </div>

                <div class="question">
                    <label for="message">Введите сообщение: </label> <br>
                    <label><textarea id="message" name="message" rows="7" cols="50"></textarea></label>
                    <!-- <span class="error" id="message-error"></span> -->
                    @error('message')
                        <br><span class="error" id="message-error">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" value="Отправить" id="submit">
                <input type="reset" value="Очистить">

                 @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Моя Персональная Страница</p>
    </footer>
    <!-- <script src="JScode/popover.js"></script>
    <script src="JScode/modal.js"></script> -->
    <!-- <script src="JScode/nav_page_loader.js"></script> -->
    <script src="JScode/drop_menu.js"></script>
    <!-- <script>
        updateHistory();
    </script> -->
</body>

</html>