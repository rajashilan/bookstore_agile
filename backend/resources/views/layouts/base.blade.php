<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Bookshop') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div class="search-container">
                            <input
                            class="search-bar"
                            type="text"
                                placeholder="Search your Books..."
                            />
                            <img class="search-icon" src="/images/searchIcon@2x.png" alt="">
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/home">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownCategory" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Categories') }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownCategory">
                                    <li>
                                        <a class="dropdown-item" href="/horror">
                                            Horror
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/mystery">
                                            Mystery
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/romance">
                                            Romance
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/adventure">
                                            Adventure
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/sci-fi">
                                            Sci-Fi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Sales') }}</a>
                            </li>
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
                            <li class="nav-item">
                                <a class="nav-link" href="/home">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownCategory" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Categories') }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownCategory">
                                    <li>
                                        <a class="dropdown-item" href="/horror">
                                            Horror
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/mystery">
                                            Mystery
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/romance">
                                            Romance
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/adventure">
                                            Adventure
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/sci-fi">
                                            Sci-Fi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Sales') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href='javascript:;' onclick='show_cart();' class="navbar-icons-link" >
                                    <img style="margin: auto; margin-top: 0.5rem; margin-left: 0.5rem; margin-right: 0.5rem;" src="images/cartIcon@2x.png" class="navbar-icons" />
                                </a>
                            </li>
                            @if ((Auth::user()->userType) == "admin")
                                <li class="nav-item"><a class="nav-link" href="admin-addbook">Add Stock</a></li>
                            @endif 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hi, {{ Auth::user()->name }}!
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
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="cart-container hidden" id="cart-container" >
            <div class="cart-header">
                <img src="images/cartIcon@2x.png" alt="" class="cart-icon">
                <h3 class="cart-total">Total: 3 items</h3>
            </div>
            <hr>
            <div class="cart-items">
                <img src="images/bookImageSample2.jpeg" alt="" class="cart-item-img">
                <div class="cart-item-details-container">
                <h3 class="cart-item-title">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</h3>
                <div class="cart-items-price-container">
                <h4 class="cart-item-price">RM39.99</h4>
                <h4 class="cart-item-quantity">Quantity: 1</h4>
                </div>
                </div>
            </div>
            <div class="cart-items">
                <img src="images/bookImageSample2.jpeg" alt="" class="cart-item-img">
                <div class="cart-item-details-container">
                <h3 class="cart-item-title">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</h3>
                <div class="cart-items-price-container">
                <h4 class="cart-item-price">RM39.99</h4>
                <h4 class="cart-item-quantity">Quantity: 1</h4>
                </div>
                </div>
            </div>
            <div class="cart-items">
                <img src="images/bookImageSample2.jpeg" alt="" class="cart-item-img">
                <div class="cart-item-details-container">
                <h3 class="cart-item-title">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</h3>
                <div class="cart-items-price-container">
                <h4 class="cart-item-price">RM39.99</h4>
                <h4 class="cart-item-quantity">Quantity: 1</h4>
                </div>
                </div>
            </div>
            <a href="/cart" class="cart-button">View Cart</a>
        </div>

        <main class="py-4">
            {{$slot}}
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
            @livewireScripts
        </main>
    </div>

    <script>
        function show_cart() {
            var cart_container = document.getElementById("cart-container");
            cart_container.classList.toggle("hidden");
        }
    </script>

</body>
</html>
