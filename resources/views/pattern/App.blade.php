<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/admin.css">
    <title>@yield('title')</title>

    <style>
        .DescriptionMain .title { font-size: 2rem; }
        @media screen and (max-width: 1024px) {
        .DescriptionMain .title { font-size: 2.2rem; }
        }
        @media screen and (max-width: 1100px) {
        .DescriptionMain .title { font-size: 1rem; }
        .title-description .title-desc-one, .title-description .title-desc-two {
        font-size: 0.5rem;
        }
        .title-description .title-desc-one h2, .title-description .title-desc-two h2 {
        font-size: 1rem;
        }
        }
        @media screen and (max-width: 648px) {
        .DescriptionMain .title { font-size: 0.5rem; }
        .title-description .title-desc-one h2, .title-description .title-desc-two h2 {
        font-size: 0.8rem;
        }
        }
       </style>
</head>

<body>
    <div class="header">
        <div class="icon">
            <img src="/image/BakeryIcon.png" alt="Иконка">
        </div>
        <nav>
            <a class="nav-link" href="{{ Route('index') }}">
                Главная
            </a>
            <a class="nav-link" href="{{ Route('products') }}">
                Товары
            </a>
            @auth
            @if(auth()->user()->role === 'admin')
            <a class="nav-link" href="{{ Route('admin.products')}}">
                Мои товары
            </a>
            <a class="nav-link" href="{{ Route('admin.applications')}}">
                Заказы
            </a>
            @endif
            @if(auth()->user()->role === 'client')
            <a class="nav-link" href="{{ Route('cart.index')}}">
                Корзина
            </a>
            @endif
            @endauth
            @csrf

            @guest
                            @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            @endif
                            @else
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            @endguest
        </nav>
    </div>

    <div>
        @yield('content')
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
