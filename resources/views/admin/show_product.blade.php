<!DOCTYPE html>
<html>

@include('admin.css')

<body>

    <header class="header">
      @include('admin.header')
    </header>

        {{-- Toastr Message --}}


        @if($message=Session::get('success'))
        <div class="alert alert-success alert-block">
          <strong>{{$message}}</strong>
        </div>
        
        
        @endif
    
        {{-- end --}}

<div class="d-flex align-items-stretch">
      @include('admin.slider')


      <div class="ml-5">
        <h1>All Product</h1>
      
        <table class="table">
          <thead>
            <tr>
            
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Image</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr class="ml-2 p-2">
              
             <td>
               {{$product->title}}
             </td>
             <td>
               {!!Str::limit($product->description,50)!!}
             </td>
             <td>
               {{$product->price}}
             </td>
             <td>
               <img height="100" width="100" src="/pro/{{$product->image}}" alt="image">
             </td>
             <td>
             <a href="{{ url('edit_product', $product->id) }}" class="btn btn-success">Edit</a>
            </td> 
    
            <td> 
              <a href="{{ url('delete_product', $product->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
            </td>
              
            </tr>
            @endforeach  
          </tbody>
        </table>
        {{$products->links()}}
      </div>

    <!-- JavaScript files-->
    <script type='text/javascript'>
    
      function confirmation(event) {
        event.preventDefault();
        var urlToRedirect = event.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
      
        Swal.fire({
          title: "Are you sure to delete this?",
          text: "This delete will be permanent.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          dangerMode: true
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = urlToRedirect;
          }
        });
      }
      
      </script>



    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
    {{-- Bootsrap src link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  
    {{-- Sweer Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
