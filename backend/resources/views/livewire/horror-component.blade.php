<div>
  <style>
    body {
    background-image: url('assets/HorrorBackground.jpg');
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
                    <div class='genre-box' style="background: linear-gradient(102.28deg, #FF9600 48.42%, rgba(255, 150, 0, 0) 96.84%); border: 5px solid #000000; border-radius:10px">
                      <h1 class='font-genre' style="color: #000000; text-align: center; font-size:40px; font-family: 'Nerko One'; line-height: 65px;">Horror</h1>
                    </div>

                <!-- intro -->
                <div class="col py-3">
                  <h5 class="#000000">Discover the best horror books and scary stories for adults, teens and kids.</h5> 
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
                            <img src={{ asset('assets/hr1.jpg') }} class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src={{ asset('assets/hr2.jpg') }} class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src={{ asset('assets/hr3.jpg') }} class="d-block w-100" alt="...">
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- book row -->
            <div class='row featured-row' style="padding-bottom:30px">
                <div class='row row-cols-2 row-cols-lg-4 g-2 g-lg-4' >
                  @if ($books)
                      @foreach ($books as $row)
                      <div style='text-align:center'>
                        <a href="{{ url('detail',$row->isbn) }}" method="POST">
                        @csrf
                        <img src="{{asset('assets/uploaded_images/books')}}/{{$row->image}}" style='display:block; margin:auto; width:200px; height:250px; border-radius:20px' />
                        </a>
                        <h6 class='font-genre' style='font-size:25px; height:60px; color: #000000;'>{{$row->title}}</h6>
                        <h6 class='font-genre' style='font-size:15px; color: #000000'>{{$row->author}}</h6>
                        <h6 class='font-genre' style='font-size:20px; color: #000000'>RM {{$row->retail_price}}</h6>
                        @if ($row -> quantity == 0)
                          <button type="submit" class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
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
            </div>
        </div>
    </div>
</div>



