<html>

@include('home.css')

<body>
  <div class="hero_area">
    
    <!-- header section strats -->
    <header class="header_section">
      @include('home.header')
    </header>
    <!-- end header section -->

   <?php
   
   $value=0;
   
   ?>
<div class="container">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product Title</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Image</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td><img width="100px" height="100px" src="\pro\{{$cart->product->image}}" alt=""></td>
     
                <td ><a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a></td>
        
              </tr>

              <?php
   
             $value= $value + $cart->product->price;
   
                ?>
            @endforeach

           
         
        </tbody>
      </table>
      </div>

 
      <h1>Total Price : {{$value}} </h1>

      <div class="container">
        <form  action="{{url('confirm_order')}}" method="POST">
            @csrf
            <div>
              <label for="name" class="form-label">Receiver Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{Auth::user()->name}}" required>
              @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div>
              <label for="address" class="form-label">Receiver Address</label>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{Auth::user()->address}}" required>
              @error('address')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div>
              <label for="phone" class="form-label">Receiver Phone</label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{Auth::user()->phone}}" required>
              @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
            <div>
                <button type="submit" class="btn btn-primary">Place Order</button>

            </div>
            
        </form>
    </div>


  

  
   
      

  <!-- end info section -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>