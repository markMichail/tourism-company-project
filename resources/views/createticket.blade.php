@extends('layouts.app')
@section('content')
<br>
<div class="container">
  <!-- Default form contact -->
  <form class="text-center border border-light p-5" action="{{ route('tickets')}}">

    <p class="h4 mb-4">Add ticket</p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="passenger_name">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="type">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="destination">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="tran_company">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="rsoom">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="asasy">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="%asasy">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="total">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="comission">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="comissionTax">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="BSP">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="sellprice">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="profit">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="safy">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="paymentType">

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit">Add ticket</button>

  </form>
  <!-- Default form contact -->
</div>
@endsection
