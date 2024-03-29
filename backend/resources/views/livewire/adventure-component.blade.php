<div>
    <div class='container-fluid'>
        <div class='container' style="padding-top:30px">
            <div class='row'>
                <div class='col-md-4'>
                    <div class='genre-box'>
                        <h1 class='font-genre' style="color: #000; text-align: left; font-size:40px">Adventure</h1>
                    </div>
                    <p class='font-genre' style="font-size:20px">Discover the best adventure books and action stories for adults, teens and kids. </p>
                </div>
                <div class='col-md-8'>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src={{ asset('assets/images/banner.jpeg') }} class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src={{ asset('assets/images/banner.jpeg') }} class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src={{ asset('assets/images/banner.jpeg') }} class="d-block w-100" alt="...">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row featured-row' style="padding-bottom:30px">
              @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
              @elseif (Session::has('login_message'))
                <div class="alert alert-danger" role="alert">{{Session::get('login_message')}}</div>
              @elseif (Session::has('cart_exist_msg'))
                <div class="alert alert-warning" role="alert">{{Session::get('cart_exist_msg')}}</div>  
              @endif
                <div class='row row-cols-2 row-cols-lg-4 g-2 g-lg-4' >
                  @if ($books)
                      @foreach ($books as $row)
                      <div style='text-align:center'>
                        <img src="{{asset('assets/uploaded_images/books')}}/{{$row->image}}" style='display:block; margin:auto; width:150px; height:250px; border-radius:20px' />
                        <h6 class='font-genre' style='font-size:25px; height:60px'>{{$row->title}}</h6>
                        <h6 class='font-genre' style='font-size:15px'>{{$row->author}}</h6>
                        <h6 class='font-genre' style='font-size:20px'>RM {{$row->retail_price}}</h6>
                        <form action="{{ url('addtocart',$row->isbn) }}" method="POST">
                          @csrf
                          <button type='submit' class='btn btn-sm' style='background-color: #FD833B; color:#fff; border-color:transparent'><span style='margin-right:8px'><i class="fa-solid fa-cart-shopping"></i></span>Add to Cart</button>
                        </form>
                      </div>
                  @endforeach
                  @else
                    <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
                      <h3>No book found in this category</h3>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
