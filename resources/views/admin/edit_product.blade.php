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
      <h1>Add Product </h1>
<div class="div_deg ms-5 ">
    
  <form  method="POST" action="{{url('update_product',$data->id)}}"  enctype="multipart/form-data">
    @csrf
    <div>
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$data->title }}" required>
      @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
    <div>
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$data->description }}" required>
      @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
    <div>
      <label for="price" class="form-label">Price</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{$data->price}}"  required>
      @error('price')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
    <div>
      <label for="quantity" class="form-label">Quantity</label>
      <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{$data->quantity}}"  required>
      @error('quantity')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>


    <div>
      <label for="category" class="form-label">Product Category</label>
      <select class="form-select" id="category" name="category_id" required>
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>
  </div>


    <div>
      <label for="image" class="form-label">Product Image</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{$data->image}}"  required>
      @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
  <input class="btn btn-primary mt-2" type="submit" value="Add Product">
  </form>
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



{{-- Bootsrap src link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  
    {{-- Sweer Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
