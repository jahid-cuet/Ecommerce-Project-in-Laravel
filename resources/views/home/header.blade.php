<nav class="navbar navbar-expand-lg custom_nav-container ">
  <a class="navbar-brand" href="index.html">
    <span>
      Giftos
    </span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class=""></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav  ">
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop.html">
          Shop
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="why.html">
          Why Us
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="testimonial.html">
          Testimonial
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact Us</a>
      </li>


   

    @if(Route::has('login'))

    @auth

    <a class="mx-5" href="{{url('mycart')}}">
      <i class="fa fa-shopping-bag" aria-hidden="true"></i>
    </a>
  </ul>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
    <input class='btn btn-success' type="submit" value="Logout">

    @else
    <div  class="user_option ">
      <a href="{{url('/login')}}">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>
          Login
        </span>
      </a>
      <a href="{{url('/register')}}">
        <i class="fa fa-vcard" aria-hidden="true"></i>
        <span>
          Register
        </span>
      </a>
      @endauth

      @endif

    </div>
  </div>
</nav>
