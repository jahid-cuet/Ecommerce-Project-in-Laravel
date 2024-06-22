<!DOCTYPE html>
<html>

@include('admin.css')

<body>

    <header class="header">
      @include('admin.header')
    </header>

<div class="d-flex align-items-stretch">
      @include('admin.slider')

      <div class="m-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Customer name</th>
                <th scope="col">Adresss</th>
                <th scope="col">Phone</th>
                <th scope="col">Product Title</th>
                <th scope="col">Product Price</th>
                <th scope="col">Status</th>
                <th scope="col">Product Image</th>
                <th scope="col">Change Status</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->receive_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td>{{$data->status}}</td>
                    <td><img width="100px" height="100px" src="/pro/{{$data->product->image}}" alt="image"></td>
                    <td>
                        <a class="btn btn-danger "href="{{url('on_the_way',$data->id)}}">On the Way</a>
                        <a class="btn btn-success "href="{{url('delivered',$data->id)}}">Deliver</a>
                    
                    </td>
                   
                    
                    
                   
                  </tr>
                  @endforeach
            </tbody>
          </table>
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
