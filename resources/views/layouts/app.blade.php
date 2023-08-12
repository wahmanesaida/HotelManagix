<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- modif -->
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="vendors/magnefic-popup/magnific-popup.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/nice-select/nice-select.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_rooms.css">
    <link rel="stylesheet" href="css/about-style.css">
    <link rel="stylesheet" href="css/restaurant.css">
    <link rel="stylesheet" href="css/header-about.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/reservation.css">




    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else
</nav>

                            <header class="header_area">
                                    <div class="header-top">

                                        <div class="d-flex align-items-center">
                                        <!--logo-->
                                        <div class="ml-auto d-none d-md-block d-md-flex">
                                            <div class="media header-top-info">
                                            <span class="header-top-info__icon"><i class="fas fa-phone-volume"></i></span>
                                            <div class="media-body">
                                                <p>Have any question?</p>
                                                <p>Free: <a href="tel:+12 365 5233">+12 365 5233</a></p>
                                            </div>
                                            </div>
                                            <div class="media header-top-info">
                                            <span class="header-top-info__icon"><i class="ti-email"></i></span>
                                            <div class="media-body">
                                                <p>Have any question?</p>
                                                <p>Free: <a href="tel:+12 365 5233">+12 365 5233</a></p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="main_menu">
                                        <nav class="navbar navbar-expand-lg navbar-light">
                                            <div class="container">

                                                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                                    <ul class="nav navbar-nav menu_nav">
                                                    <li class="nav-item active"><a class="nav-link" href="/home">Home</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="/rooms">Rooms</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="restaurant.php">Restaurant</a></li>

                                                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="/Booking_customer">Booking</a></li>
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ Auth::user()->name }}
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
        </nav>
                                                        </div>
                                                </li>


                                                    </ul>

    </header>
                    @endguest
                </ul>
                </div>

            </div>
        </nav>

</div>
    <main class="site-main">
        @yield('content')
        </main>
    </div>
</body>
</html>
