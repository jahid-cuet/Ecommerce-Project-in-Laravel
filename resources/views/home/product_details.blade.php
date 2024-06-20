<!DOCTYPE html>
<html>

@include('home.css')

<body>
  <div class="hero_area">
    
    <!-- header section strats -->
    <header class="header_section">
      @include('home.header')
    </header>
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="/pro/{{$data->image}}" alt="">
              </div>
              <div class="detail-box">
              </h6>{{$data->title}}<h6>
                  <h6>
                  Price
                  <span>
                    ${{$data->price}}
                  </span>
                </h6>
              </div>
              </h6>Quantity : {{$data->quantity}}<h6>
                  <h6>
                    Description : {{$data->description}}
                </h6>
                  <h6>
                    Description : {{$category->category_name}}
                </h6>
              
        </a>
      </div>
    </div>

       
  </section>


  <!-- info section -->
@include('home.footer')

  <!-- end info section -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>
</html>