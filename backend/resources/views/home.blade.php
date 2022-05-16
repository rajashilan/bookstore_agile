<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
            <div class="navbar-main-container">
          <div class="navbar-logo-container">
            <img src="images/logo@2x.png" class="navbar-logo" />
          </div>
          <div class="search-container">
            <input
              class="search-bar"
              type="text"
                placeholder="Search your Books"
            />
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

        <style>
</style>
</head>
<body>
<div class="homepage-slideshow-container">

<div class="homepage-mySlides homepage-mySlides-fade">
  <img class="homepage-mySlides-img" src="images/sample_image_2.jpg">
</div>

<div class="homepage-mySlides homepage-mySlides-fade">
  <img class="homepage-mySlides-img" src="images/sample_image_2.jpg">
</div>

<div class="homepage-mySlides homepage-mySlides-fade">
  <img class="homepage-mySlides-img" src="images/sample_image_2.jpg">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="homepage-mySlides-dot"></span> 
  <span class="homepage-mySlides-dot"></span> 
  <span class="homepage-mySlides-dot"></span> 
</div>

<script src="js/carousel.js"></script>
</body>
</html>