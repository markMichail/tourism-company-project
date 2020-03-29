<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark lighten-1" style="background-color:#128B92">
  <a class="navbar-brand" href="#">PharoMina Tours</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>








  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">


    </ul>


    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      {{-- @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif --}}
  @else
  <li class="nav-item">
      <a class="nav-link" href="/">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/createticket">Create Receipt</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/allcustomers">All Customers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/allorders">All Orders</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/alltickets">All Tickets</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/safe">Treasury</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/reports">Reports</a>
    </li>
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>


          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>


              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>

  @endguest

    </ul>
</div>










</nav>
<!--/.Navbar -->
