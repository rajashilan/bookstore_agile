<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/application.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    
    <?php echo \Livewire\Livewire::styles(); ?>


    <script src="https://kit.fontawesome.com/fe193ed585.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js" integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="home-page home-01 ">

	<!--header-->
	<header id="header" class="header header-style-1">
        <?php if($userType ?? ''): ?>
  <?php if($userType == 'admin'): ?>
            <div class="navbar-main-container">
          <div class="navbar-logo-container">
            <img src="images/logo@2x.png" class="navbar-logo" />
          </div>
          <div class="search-container">
            <input
              class="search-bar"
              type="text"
                placeholder="Search your Books..."
            />
            <img class="search-icon" src="/images/searchIcon@2x.png" alt="">
          </div>
          <div class="navbar-menu-container">
            <a href="#" class="navbar-menu-items">
              Home
            </a>
            <a href="#" class="navbar-menu-items">
              Books
            </a>
            <a href="#" class="navbar-menu-items">
              Sales
            </a>
          </div>
          <div class="navbar-icons-container">
            <a href="#" class="navbar-icons-link">
              <img src="images/personIcon@2x.png" class="navbar-icons" />
            </a>
                        <a href="#" class="navbar-icons-link">
              <img src="images/logoutIcon@2x.png" class="navbar-icons" />
            </a>
          </div>
          <a class="navbar-primary-button">Add Books</a>
        </div>
        <?php elseif($userType == 'user'): ?>
                    <div class="navbar-main-container">
          <div class="navbar-logo-container">
            <img src="images/logo@2x.png" class="navbar-logo" />
          </div>
          <div class="search-container">
            <input
              class="search-bar"
              type="text"
                placeholder="Search your Books..."
            />
            <img class="search-icon" src="/images/searchIcon@2x.png" alt="">
          </div>
          <div class="navbar-menu-container">
            <a href="#" class="navbar-menu-items">
              Home
            </a>
            <a href="#" class="navbar-menu-items">
              Books
            </a>
            <a href="#" class="navbar-menu-items">
              Sales
            </a>
          </div>
          <div class="navbar-icons-container">
            <h4 class="navbar-text">Hi, <?php echo e($userName); ?>!</h4>
                        <a href="#" class="navbar-icons-link">
              <img src="images/personIcon@2x.png" class="navbar-icons" />
            </a>
            <a href="#" class="navbar-icons-link">
              <img src="images/cartIcon@2x.png" class="navbar-icons" />
            </a>
                        <a href="#" class="navbar-icons-link">
              <img src="images/logoutIcon@2x.png" class="navbar-icons" />
            </a>
          </div>
        </div>
        <?php endif; ?>
        <?php else: ?>
                    <div class="navbar-main-container">
          <div class="navbar-logo-container">
            <img src="images/logo@2x.png" class="navbar-logo" />
          </div>
          <div class="search-container">
            <input
              class="search-bar"
              type="text"
                placeholder="Search your Books..."
            />
            <img class="search-icon" src="/images/searchIcon@2x.png" alt="">
          </div>
          <div class="navbar-menu-container">
            <a href="#" class="navbar-menu-items">
              Home
            </a>
            <a href="#" class="navbar-menu-items">
              Books
            </a>
            <a href="#" class="navbar-menu-items">
              Sales
            </a>
          </div>
          <div class="navbar-icons-container">
            <a href="#" class="navbar-icons-link">
              <img src="images/cartIcon@2x.png" class="navbar-icons" />
            </a>
            <a href="#" class="navbar-icons-link">
              <img src="images/personIcon@2x.png" class="navbar-icons" />
            </a>
          </div>
          <a class="navbar-primary-button">Sign Up</a>
        </div>
        <?php endif; ?>
	</header>

    <?php echo e($slot); ?>


	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html><?php /**PATH D:\Laragon\www\agiledev\resources\views/pages/base.blade.php ENDPATH**/ ?>