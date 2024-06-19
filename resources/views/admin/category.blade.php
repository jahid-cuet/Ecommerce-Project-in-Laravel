<!DOCTYPE html>
<html>
<head>
  @include('admin.css')

<style type="text/css">

input[type='text']
{
  width:400px;
  height: 50px;
}
.div_deg
{
  display: flex;
  justify-content: center;
  align-items: center
}

</style>

</head>


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

<div class=" d-flex align-items-stretch">
      @include('admin.slider')

<div class="div_deg">
  <form action="{{url('add_category')}}"  method="POST">
    @csrf
    {{-- <div>
      <input type="text" name="category">

    </div> --}}
    <div>
      <label for="category_name" class="form-label">Category</label>
      <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{ old('category_name') }}" required>
      @error('category_name')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <input class="btn btn-primary mt-2" type="submit" value="Add Category">
  </div>
  </form>
  <div class="ml-5">
    <h1>Category</h1>
  
    <table class="table">
      <thead>
        <tr>
        
          <th scope="col">Category Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $d)
        <tr class="ml-2 p-2">
          
         <td>
          <a href="" class="btn btn-primary">{{ $d->category_name }}</a>
         </td>
          
          <td> 
            <a href="" class="btn btn-warning">Edit</a>
          </td>

          <td >
            <a href="" class="btn btn-danger">Delete</a>
          </td>
          
        </tr>
        @endforeach
       
        
        
      </tbody>
    </table>
  </div>
  
</div>
</div>
      


    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
