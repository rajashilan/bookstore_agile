<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Bookshop')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
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
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/home"><?php echo e(__('Home')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/signup"><?php echo e(__('Books')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Sales')); ?></a>
                            </li>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/home"><?php echo e(__('Home')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Books')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Sales')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href='javascript:;' onclick='show_cart();' class="navbar-icons-link" >
                                    <img style="margin: auto; margin-top: 0.5rem; margin-left: 0.5rem; margin-right: 0.5rem;" src="images/cartIcon@2x.png" class="navbar-icons" />
                                </a>
                            </li>
                            <?php if((Auth::user()->userType) == "admin"): ?>
                                <li class="nav-item"><a class="nav-link" href="admin-addbook">Add Stock</a></li>
                            <?php endif; ?> 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hi, <?php echo e(Auth::user()->name); ?>!
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
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
            <?php echo $__env->yieldContent('content'); ?>
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
<?php /**PATH D:\Laragon\www\agiledev\resources\views/layouts/app.blade.php ENDPATH**/ ?>