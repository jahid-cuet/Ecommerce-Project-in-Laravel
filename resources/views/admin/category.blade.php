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

<div class="d-flex align-items-stretch">
      @include('admin.slider')
<div class="div_deg">
  <form action="{{url('add_category')}}"  method="POST">
    @csrf
    <div>
      <input type="text" name="category">
      <input class="btn btn-primary"type="submit" value="Add Category">
    </div>
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


</body>

</html>
