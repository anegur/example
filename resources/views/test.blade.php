<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Персональная страничка</title>

        @vite(['resources/css/style.css', 'resources/css/style_test.css', 'resources/js/date_viewer.js', 'resources/js/history.js'])
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
            <h1>Тест по дисциплине</h1>
            <!-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif -->
            <h2>Численные методы в информатике</h2>
            <div class="main_content">
                <form id="test" method="post" action="{{ route('test.ValidateForm') }}">
                    @csrf
                    <p>Введите своё ФИО:
                        <input type="text" id="name" name="name" value="{{ old('name') }}">
                        <!-- @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror -->
                    </p>
                    <p>Выберите свою группу:
                        <select name="group" id="group">
                            <optgroup label="1 курс">
                                <option value="IT231">ИТ/б-23-1-о </option>
                                <option value="IT232">ИТ/б-23-2-о </option>
                                <option value="IT233">ИТ/б-23-3-о </option>
                                <option value="IT234">ИТ/б-23-4-о </option>
                                <option value="IT235">ИТ/б-23-5-о </option>
                                <option value="IT236">ИТ/б-23-6-о </option>
                                <option value="IT237">ИТ/б-23-7-о </option>
                                <option value="IT238">ИТ/б-23-8-о </option>
                            </optgroup>
                            <optgroup label="2 курс">
                                <option value="IT221">ИТ/б-22-1-о</option>
                                <option value="IT222">ИТ/б-22-2-о</option>
                                <option value="IT223">ИТ/б-22-3-о</option>
                                <option value="IT224">ИТ/б-22-4-о</option>
                                <option value="IT225">ИТ/б-22-5-о</option>
                                <option value="IT226">ИТ/б-22-6-о</option>
                            </optgroup>
                            <optgroup label="3 курс">
                                <option value="PI211">ПИ/б-21-1-о</option>
                                <option value="IS211">ИС/б-21-1-о</option>
                                <option value="IS211">ИС/б-21-1-о</option>
                                <option value="IS211">ИС/б-21-1-о</option>
                                <option value="IVT211">ИВТ/б-21-1-о</option>
                                <option value="IVT211">ИВТ/б-21-1-о</option>
                                <option value="PIN211">ПИН/б-21-1-о</option>
                                <option value="IB211">ИБ/б-21-1-о</option>
                            </optgroup>
                        </select>
                        <!-- @error('group')
                            <div class="error">{{ $message }}</div>
                        @enderror -->
                    </p>

                    <p>Вопрос 1: Какие из перечисленных методов численного интегрирования являются методами прямоугольников?</p>
                    <input type="checkbox" name="question1[]" value="option1"> Метод трапеций<br>
                    <input type="checkbox" name="question1[]" value="option2"> Метод левых прямоугольников<br>
                    <input type="checkbox" name="question1[]" value="option3"> Метод правых прямоугольников<br>
                    <input type="checkbox" name="question1[]" value="option4"> Метод Симпсона<br>
                    <!-- @error('question1')
                        <div class="error">{{ $message }}</div>
                    @enderror -->

                    <p>Вопрос 2: Какой метод численного решения дифференциальных уравнений является неявным?</p>
                    <select id="question2" name="question2">
                        <optgroup label="Группа A">
                            <option value="A1">Метод Эйлера</option>
                            <option value="A2">Метод Эйлера с пересчётом</option>
                        </optgroup>
                        <optgroup label="Группа B">
                            <option value="B1">Метод Рунге-Кутты</option>
                            <option value="B2">Метод Адамса-Башфорта</option>
                        </optgroup>
                    </select>
                    <!-- @error('question2')
                        <div class="error">{{ $message }}</div>
                    @enderror -->

                    <p>Вопрос 3: Сколько итераций необходимо для вычисления корня уравнения f(x) = 0 методом половинного деления на отрезке [a, b] с заданной точностью ε?</p>
                    <input type="text" id="question3" name="question3">
                    <!-- @error('question3')
                        <div class="error">{{ $message }}</div>
                    @enderror -->
                    @if ($errors->any())
                        <script>
                            let errorMessages = "";
                            @foreach ($errors->all() as $error)
                                errorMessages += "{{ $error }}\n";
                            @endforeach
                            alert("Ошибки:\n" + errorMessages);
                        </script>
                    @endif
                    <br><br>

                    <button type="submit">Отправить</button>
                    <button type="reset">Очистить форму</button>
                    @if (session('success'))
                        <!-- <div class="alert alert-success">
                            {{ session('success') }}
                        </div> -->
                        <script>
                            alert("{{session('success')}}");
                        </script>
                    @endif
                </form>
                <script>
                    tochecktest("test");
                </script>
            </div>
        </main>

        <footer>
            <p>&copy; 2023 Моя Персональная Страница</p>
        </footer>
    </body>
</html>



