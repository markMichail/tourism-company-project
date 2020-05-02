<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark" style="background-color:#128B92">
  <a class="navbar-brand" href="/home">PharoMina Tours</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
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
        <a class="nav-link" href="{{ route('home') }}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('allcustomers.index') }}">All Customers</a>
      </li>
      {{-- <li class="nav-item">
      <a class="nav-link" href="/addcustomer">Add Customer</a>
    </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Orders</a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="{{route('order.create')}}">New Order</a>
          <a class="dropdown-item" href="{{route('order.index')}}">All Orders</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Tickets</a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="{{route('tickets.index')}}">All Tickets</a>
          <a class="dropdown-item" href="{{ route('allrefundedtickets') }}">Refunded Tickets</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Reports</a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="{{ route('ticketsreports') }}">Tickets Reports</a>
          <a class="dropdown-item" href="{{ route('receiptsreports') }}">Recipets Reports</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('allsafereciepts') }}">Safe</a>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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