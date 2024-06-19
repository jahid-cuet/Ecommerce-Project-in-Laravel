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

      <h1 class="ms-5">Update Category</h1>
<div class="div_deg">
    
  <form action="{{url('update_category',$data->id)}}"  method="POST">
    @csrf
    <div>
      <label for="category_name" class="form-label">Category</label>
      <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{$data->category_name }}" required>
      @error('category_name')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <input class="btn btn-primary mt-2" type="submit" value="Add Category">
  </div>
  </form>
  
</div>
</div>
      



    
    


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
