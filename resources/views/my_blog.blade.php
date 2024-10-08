<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Персональная страничка</title>

    @vite([
    'resources/css/style.css',
    'resources/css/style_my_blog.css',
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
                <li><a href="{{ route('education') }}">Учёба</a></li>
                <li><a href="{{ route('photo_album') }}">Фотоальбом</a></li>
                <li><a href="{{ route('contact') }}">Контакт</a></li>
                <li><a href="{{ route('test') }}">Тест по дисциплине</a></li>
                <li><a href="{{ route('guest_book') }}">Гостевая книга</a></li>
                <li><a href="{{ route('blog_editor') }}">Редактор блога</a></li>
                <li><a href="{{ route('my_blog') }}">Блог</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="page-content">
            <h1>Мой Блог</h1>
            <div class="container">
                <h2 class="divider">Последние статьи</h2>

                <div class="blog">
                    @if(isset($blogdata))
                        @foreach ($blogdata as $post)
                            <div class="post" id="post-{{ $post->post_id }}">
                                <div class="main-data">
                                    <p class="title">{{ $post->title }}</p>
                                    <p>{{ $post->created_at }}</p>
                                </div>

                                <img class="post-img" src="{{ Storage::url($post->image) }}" alt="Изображение записи">
                                <p class="message">{{ $post->message }}</p>
                                <p class="author-post">Автор: {{ $post->author }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>Нет блогов для отображения.</p>
                    @endif
                </div>

                <!-- Пагинация -->
                <div class="pagination">
                    <form method="GET" action="{{ url('/my_blog') }}">
                        <label for="posts_per_page">Записи на страницу:</label>
                        <select id="posts_per_page" name="posts_per_page" onchange="this.form.submit()">
                            <option value="5" {{ request('posts_per_page') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('posts_per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request('posts_per_page') == 20 ? 'selected' : '' }}>20</option>
                            <option value="30" {{ request('posts_per_page') == 30 ? 'selected' : '' }}>30</option>
                        </select>
                    </form>

                    <div>
                        <p>Записи: {{ $blogdata->firstItem() }}-{{ $blogdata->lastItem() }} из {{ $blogdata->total() }}
                        </p>
                        <ul class="pagination-links">
                            @if ($blogdata->hasPages())
                                <li><a href="{{ $blogdata->previousPageUrl() }}">Назад</a></li>
                                @foreach ($blogdata->getUrlRange(1, $blogdata->lastPage()) as $page => $url)
                                    <li>
                                        <a href="{{ $url }}"
                                            class="{{ ($page == $blogdata->currentPage()) ? 'active' : '' }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                <li><a href="{{ $blogdata->nextPageUrl() }}">Вперед</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
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