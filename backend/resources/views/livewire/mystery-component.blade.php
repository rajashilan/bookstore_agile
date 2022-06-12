<div>
  <style>
    body {
    background-image: url('assets/Mystery.jpg');
    background-size: 100%;
    background-position: 100%;
    background-attachment: fixed;
    background-repeat: no-repeat;
    }
  </style>

        <div class='container' style="padding-top:30px">
            <div class='row'>
                <!-- genre -->
                <div class='col-md-3'>
                    <div class='genre-box' style="background: linear-gradient(102.28deg, #55B7FF 62.6%, rgba(255, 150, 0, 0) 96.84%); border: 5px solid #FFFFFF; border-radius:10px">
                      <h1 class='font-genre' style="color: #FFFFFF; text-align: center; font-size:40px; font-family: 'Nerko One'; line-height: 65px;">Mystery</h1>
                    </div>

                <!-- intro -->
                <div class="col py-3">
                  <h5 class="text-warning"> Uncover and dive deep in the Mystery Fiction and all its subgenres, 
                    including Detective, Crime and Thrillers.
                  </h5> 
                </div>
                </div>
                
                <!-- carousel -->
                <div class='col-md-9'>
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
            <div class='row featured-row' style="padding-bottom:30px">
              @if (Session::has('message'))
                <div class="alert alert-success" style='margin-top: 20px;' role="alert">{{Session::get('message')}}</div>
              @elseif (Session::has('login_message'))
                <div class="alert alert-danger" style='margin-top: 20px;' role="alert">{{Session::get('login_message')}}</div>
              @elseif (Session::has('cart_exist_msg'))
                <div class="alert alert-warning" style='margin-top: 20px;' role="alert">{{Session::get('cart_exist_msg')}}</div>  
              @endif
                <div class='row row-cols-2 row-cols-lg-4 g-2 g-lg-4' >
                  @if ($books)
                    @foreach ($books as $row)
                      <div style='text-align:center'>
                        <img src="{{asset('assets/uploaded_images/books')}}/{{$row->image}}" style='display:block; margin:auto; width:200px; height:250px; border-radius:20px' />
                        <h6 class='font-genre' style='font-size:25px; height:60px; color: #FFFFFF'>{{$row->title}}</h6>
                        <h6 class='font-genre' style='font-size:15px; color: #FFFFFF'>{{$row->author}}</h6>
                        <h6 class='font-genre' style='font-size:20px; color: #FFFFFF'>RM {{$row->retail_price}}</h6>
                        <form action="{{ url('addtocart',$row->isbn) }}" method="POST">
                          @csrf
                          <button type='submit' class='btn btn-sm' style='background-color: #3B89FD; color:#fff; border-color:transparent'><span style='margin-right:8px'><i class="fa-solid fa-cart-shopping"></i></span>Add to Cart</button>
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

