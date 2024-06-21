
</html>

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

   
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product Title</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Image</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td><img width="100px" height="100px" src="\pro\{{$cart->product->image}}" alt=""></td>
     
         
              </tr>
            @endforeach
         
        </tbody>
      </table>

 


  <!-- end info section -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>