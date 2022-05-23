<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  <!-- navbar -->
  @if($userType ?? '')
  @if($userType == 'admin')
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
                        <a href="/logout" class="navbar-icons-link">
              <img src="images/logoutIcon@2x.png" class="navbar-icons" />
            </a>
          </div>
          <a class="navbar-primary-button">Add Books</a>
        </div>
        @elseif($userType == 'user')
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
            <h4 class="navbar-text">Hi, {{$userName}}!</h4>
                        <a href="#" class="navbar-icons-link">
              <img src="images/personIcon@2x.png" class="navbar-icons" />
            </a>
            <a href="#" class="navbar-icons-link">
              <img src="images/cartIcon@2x.png" class="navbar-icons" />
            </a>
                        <a href="/logout" class="navbar-icons-link">
              <img src="images/logoutIcon@2x.png" class="navbar-icons" />
            </a>
          </div>
        </div>
        @endif
        @else
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
          <a href="/signup" class="navbar-primary-button">Sign Up</a>
        </div>
        @endif
        <!-- end of navbar -->
<div class="homepage-slideshow-container">

<div class="homepage-mySlides homepage-mySlides-fade">
  <img class="homepage-mySlides-img" src="images/sample_image_1.jpg">
</div>

<div class="homepage-mySlides homepage-mySlides-fade">
  <img class="homepage-mySlides-img" src="images/sample_image_2.jpg">
</div>

<div class="homepage-mySlides homepage-mySlides-fade">
  <img class="homepage-mySlides-img" src="images/sample_image_3.jpeg">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="homepage-mySlides-dot"></span> 
  <span class="homepage-mySlides-dot"></span> 
  <span class="homepage-mySlides-dot"></span> 
</div>

        <div class="homepage-categories-main-container">
          <div class="homepage-categories-container">
            <div class="homepage-categories-item-container">
               <a class="homepage-categories-link-img" href="/horror">
              <img src="/images/horrorIcon@2x.png" alt="" class="homepage-categories-icon">
              <p class="homepage-categories-text">Horror</p>
               </a>
            </div>
          </div>
                    <div class="homepage-categories-container">
            <div class="homepage-categories-item-container">
               <a class="homepage-categories-link-img" href="/mystery">
              <img src="/images/mysteryIcon@2x.png" alt="" class="homepage-categories-icon">
              <p class="homepage-categories-text">Mystery</p>
               </a>
            </div>
          </div>
                    <div class="homepage-categories-container">
            <div class="homepage-categories-item-container">
              <a class="homepage-categories-link-img" href="/romance">
              <img src="/images/romanceIcon@2x.png" alt="" class="homepage-categories-icon">
              <p class="homepage-categories-text">Romance</p>
               </a>
            </div>
          </div>
                    <div class="homepage-categories-container">
            <div class="homepage-categories-item-container">
              <a class="homepage-categories-link-img" href="/adventure">
              <img src="/images/adventureIcon@2x.png" alt="" class="homepage-categories-icon">
              <p class="homepage-categories-text">Adventure</p>
               </a>
            </div>
          </div>
                    <div class="homepage-categories-container">
            <div class="homepage-categories-item-container">
              <a class="homepage-categories-link-img" href="/scifi">
              <img src="/images/scifiIcon@2x.png" alt="" class="homepage-categories-icon">
              <p class="homepage-categories-text">Sci-Fi</p>
              </a>
            </div>
          </div>
          <a href="#" class="homepage-categories-link">See all</a>
        </div>

        <h1 class="homepage-title-text">Featured</h1>
        <div class="homepage-cards-main-container">
          <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                    <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                    <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                    <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                    <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                    <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                    <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                    <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                              <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
                              <div class="homepage-cards-container">
            <img src="/images/bookImageSample@2x.png" alt="" class="homepage-cards-img">
            <p class="homepage-cards-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</p>
            <img src="/images/ratingSample@2x.png" alt="" class="homepage-cards-rating">
          </div>
        </div>

        <div class="homepage-review-main-container">
          <div class="homepage-review-container">
            <div class="homepage-review-items-container">
              <h3 class="homepage-review-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</h3>
              <p class="homepage-review-subtext">- Joy</p>
            </div>
                        <div class="homepage-review-items-container">
              <h3 class="homepage-review-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</h3>
              <p class="homepage-review-subtext">- Joy</p>
            </div>
                        <div class="homepage-review-items-container">
              <h3 class="homepage-review-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</h3>
              <p class="homepage-review-subtext">- Joy</p>
            </div>
          </div>
        </div>

<script src="js/carousel.js"></script>
</body>
</html>
