@extends('layouts.app')
@section('content')
<div class="container my-5">
  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
      {{Session::forget('alert')}}
    }
  </script>
    <!-- Section: Block Content -->
    <section>
      <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">Hello @if (Auth::user()->privilege == '1' or Auth::user()->privilege == '2')Admin @endif </h6>
      <h3 class="font-weight-bold text-center dark-grey-text pb-2">Statistic Data</h3>
      <hr class="w-header my-4">
      {{-- <p class="lead text-center text-muted pt-2 mb-5">Some data for this week.</p> --}}
      <div class="row white-text justify-content-center">
        @if (Auth::user()->privilege == '1' or Auth::user()->privilege == '2')
        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-4">
          <!-- Card Primary -->
          <div class="card classic-admin-card primary-color">
            <a style="color: inherit;" href="/allcustomers">
            <div class="card-body py-3">
              <i class="far fa-money-bill-alt"></i>
              <p class="small">Customers</p>
              <h4>{{$data['customers']}}</h4>
            </div>
            {{-- <div class="progress md-progress">
              <div class="progress-bar grey darken-3" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
            {{-- <div class="card-body pt-2 pb-3">
              <p class="small mb-0">Better than last week (25%)</p>
            </div> --}}
          </a>
          </div>
          <!-- Card Primary -->
        </div>
        <!-- Grid column -->
        @endif
        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-4">
          <!-- Card Yellow -->
          <div class="card classic-admin-card warning-color">
            <a style="color: inherit;" href="/tickets">
            <div class="card-body py-3">
              <i class="fas fa-chart-line"></i>
              <p class="small">Tickets</p>
              <h4>{{$data['tickets']}} </h4>
            </div>
            {{-- <div class="progress md-progress">
              <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
            {{-- <div class="card-body pt-2 pb-3">
              <p class="small mb-0">Worse than last week (25%)</p>
            </div> --}}
            </a>
          </div>
          <!-- Card Yellow -->
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-4">
          <!-- Card Blue -->
          <div class="card classic-admin-card light-blue lighten-1">
            <a style="color: inherit;" href="/allrefundedtickets">
            <div class="card-body py-3">
              <i class="fas fa-chart-pie"></i>
              <p class="small">Refunded Tickets</p>
              <h4>{{$data['refundedTickets']}}</h4>
            </div>
            {{-- <div class="progress md-progress">
              <div class="progress-bar grey darken-3" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
            {{-- <div class="card-body pt-2 pb-3">
              <p class="small mb-0">Better than last week (75%)</p>
            </div> --}}
            </a>
          </div>
          <!-- Card Blue -->
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-4">
          <!-- Card green -->
          <div class="card classic-admin-card green accent-2">
            <a style="color: inherit;" href="/">
            <div class="card-body py-3">
              <i class="fas fa-chart-bar"></i>
              <p class="small">Late customer payments</p>
            <h4>{{$data['latePayments']}}</h4>
            </div>
            {{-- <div class="progress md-progress">
              <div class="progress-bar grey darken-3" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
            {{-- <div class="card-body pt-2 pb-3">
              <p class="small mb-0">Better than last week (25%)</p>
            </div> --}}
          </a>
          </div>
          <!-- Card green -->
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-xl">
          <!-- Card Red -->
          <div class="card" style="width: 100%;">
          <div class="card classic-admin-card red accent-2">
            <a style="color: inherit;" href="/notifications">
              <div class="card-body py-3">
                <i class="far fa-envelope"></i>
                <p style="display: inline;">Notifications</p>
                <h5 style="float: right;">{{count(auth()->user()->unreadNotifications)}}</h5>
              </div>
            </a>
          </div>
          </div>
          <!-- Card Red -->
        </div>
        <!-- Grid column -->
      </div>
    </section>
    <!-- Section: Block Content -->
  </div>
@endsection