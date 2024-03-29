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
                                <a class="nav-link" href="/">{{ __('Home') }}</a>
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
                                    <li>
                                        <a class="dropdown-item" href="/children">
                                            Children
                                        </a>
                                    </li>
                                </ul>
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
                                <a class="nav-link" href="/">{{ __('Home') }}</a>
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
                                    <li>
                                        <a class="dropdown-item" href="/children">
                                            Children
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href='javascript:;' onclick='show_cart();' class="navbar-icons-link" >
                                    <img style="margin: auto; margin-top: 0.5rem; margin-left: 0.5rem; margin-right: 0.5rem;" src="http://127.0.0.1:8000/images/cartIcon@2x.png" class="navbar-icons" />
                                </a>
                            </li>
                            @if ((Auth::user()->userType) == "admin")
                                <li class="nav-item"><a class="nav-link" href="admin-listbook">View Stock</a></li>
                            @endif 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hi, {{ Auth::user()->name }}!
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li style="text-align: center;">
                                        <img style="margin: auto; margin-top: 0.5rem; margin-left: 0.5rem; margin-right: 0.5rem;" src="images/personIcon@2x.png" />
                                    </li>
                                        <!-- <li><hr class="dropdown-divider"></li> -->
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item">
                                            Name: {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item">
                                            Email: {{ Auth::user()->email }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/update-profile">
                                            Update Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="cart-container hidden" id="cart-container" >
            <div class="cart-header">
                <img src="http://127.0.0.1:8000/images/cartIcon@2x.png" alt="" class="cart-icon">
                @if ($cartarray ?? '')
                @if (count($cartarray ?? '') > 0)
                <h3 class="cart-total">Total: {{count($cartarray ?? '')}} items</h3>
                @else
                <h3 class="cart-total">Total: 0 item</h3>
                @endif
                @else 
                <h3 class="cart-total">Total: 0 item</h3>
                @endif
            </div>
            <hr>
            @if ($cartarray ?? '')
                @foreach ($cartarray ?? '' as $items)
            <div class="cart-items">
                <img src="{{asset('assets/uploaded_images/books')}}/{{$items['book'][0] -> image}}" alt="" class="cart-item-img">
                <div class="cart-item-details-container">
                <h3 class="cart-item-title">{{$items["book"][0] -> title}}</h3>
                <div class="cart-items-price-container">
                <h4 class="cart-item-price">RM{{$items["book"][0] -> retail_price}}</h4>
                <h4 class="cart-item-quantity">Quantity: {{$items['record'] -> quantity}}</h4>
                </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
                    <h3>No item found in cart! </h3>
                </div>
            @endif
            <a href="/cart" class="cart-button">View Cart</a>
        </div>

        <main class="py-4">
            @yield('content')
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