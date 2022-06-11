@extends('layouts.app')

@section('content')
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
              <a class="homepage-categories-link-img" href="/sci-fi">
              <img src="/images/scifiIcon@2x.png" alt="" class="homepage-categories-icon">
              <p class="homepage-categories-text">Sci-Fi</p>
              </a>
            </div>
          </div>
          <a href="#" class="homepage-categories-link">See all</a>
        </div>

        <h1 class="homepage-title-text">Featured</h1>
        @if (Session::has('message'))
          <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @elseif (Session::has('login_message'))
          <div class="alert alert-danger" role="alert">{{Session::get('login_message')}}</div>
        @elseif (Session::has('cart_exist_msg'))
          <div class="alert alert-warning" role="alert">{{Session::get('cart_exist_msg')}}</div>  
        @endif
        <div class="homepage-cards-main-container">
          @if ($books)
              @foreach ($books as $row)
                <div class="homepage-cards-container">
                <img src="{{asset('assets/uploaded_images/books')}}/{{$row->image}}" alt="" class="homepage-cards-img">
                  <p class="homepage-cards-text">{{$row->title}}</p>
                  <p class="homepage-cards-text">{{$row->author}}</p>
                  <p class="homepage-cards-text">RM {{$row->retail_price}}</p>
                  @if ($row -> quantity == 0)
                          <button type="button" class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
                  @else
                  <form action="{{ url('addtocart',$row->isbn) }}" method="POST">
                    @csrf
                    <button type='submit' class='btn btn-sm' style='background-color: #FD833B; color:#fff; border-color:transparent'><span style='margin-right:8px'><i class="fa-solid fa-cart-shopping"></i></span>Add to Cart</button>
                  </form>
                  @endif
                </div>
              @endforeach 
          @else
            <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
              <h3>No book found in this category</h3>
            </div>
          @endif
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
@endsection
<script>
  console.log($books)
</script>