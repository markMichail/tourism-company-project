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
    <button class="btn btn-info btn-block"  data-toggle="modal" data-target="#exampleModalCenter" type="button">Add ticket</button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
  
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
  
  
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Add another Ticket ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#sideModalTR" data-dismiss="modal">Yes</button>
          <button type="submit" class="btn btn-primary">No</button>
        </div>
      </div>
    </div>
  </div>
  </form>




<!-- To change the direction of the modal animation change .right class -->
<div class="modal fade left" id="sideModalTR" {{--data-backdrop="false"--}} tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-bottom-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Recipt 500000001</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        current added tickets:
        <div class="badge badge-primary text-wrap" style="width: 1rem;">
          3
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
<!-- Side Modal Top Right -->

  <!-- Default form contact -->
</div>

@endsection
