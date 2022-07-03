<div>
  <div class='container-fluid' style="background-repeat:no-repeat; background-size:cover">
    <div class='container' style="padding-top:30px">
            <div class='row'>
                <!-- genre -->
                <div class='col-md-4'>
                    <div class='genre-box' style="border:5px solid #000; border-radius:20px">
                        <h1 class='font-genre' style="color: #000; text-align: center; font-size:40px">Mystery</h1>
                    </div>
                    <p class='font-genre' style="font-size:20px">Uncover and dive deep in the Mystery Fiction and all its subgenres, 
                    including Detective, Crime and Thrillers.</p>
                </div>
                <!-- carousel -->
                <div class='col-md-8'>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src={{ asset('assets/mys1.jpg') }} class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src={{ asset('assets/mys2.jpg') }} class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src={{ asset('assets/mys3.jpg') }} class="d-block w-100" alt="...">
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- book row -->
            <div class='row featured-row' style="padding-bottom:30px; margin-top:20px">
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
                        <a href="{{ url('detail',$row->isbn) }}" method="POST">
                        @csrf
                        <img src="{{asset('assets/uploaded_images/books')}}/{{$row->image}}" style='display:block; margin:auto; width:200px; height:250px; border-radius:20px' />
                        </a>
                        <h6 class='font-genre' style='font-size:25px; height:60px; color: #FFFFFF'>{{$row->title}}</h6>
                        <h6 class='font-genre' style='font-size:15px; color: #FFFFFF'>{{$row->author}}</h6>
                        <h6 class='font-genre' style='font-size:20px; color: #FFFFFF'>RM {{$row->retail_price}}</h6>
                        @if ($row -> quantity == 0)
                          <button type="submit" class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
                        @else
                          <form action="{{ url('addtocart',$row->isbn) }}" method="POST">
                          @csrf
                          <button type='submit' class='btn btn-sm' style='background-color: #3B89FD; color:#fff; border-color:transparent'><span style='margin-right:8px'><i class="fa-solid fa-cart-shopping"></i></span>Add to Cart</button>
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
            </div>
    </div>
  </div>
</div>

