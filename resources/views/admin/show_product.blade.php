<!DOCTYPE html>
<html>

@include('admin.css')

<body>

    <header class="header">
      @include('admin.header')
    </header>

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
              
    
            {{-- <td> 
              <a href="{{ url('delete_category', $d->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
            </td> --}}
              
            </tr>
            @endforeach
           
            
            
          </tbody>
        </table>
        {{$products->links()}}
      </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>


</body>

</html>
