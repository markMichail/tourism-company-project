{{-- @extends('layouts.app')
@section('content')

<form class="border border-light p-5">

  <p class="h4 mb-4 text-center">Add Customer</p>

  <div class="form-group">
    <label for="formGroupExampleInput">Customer Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="customer's name">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Phone Number</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone number">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="customer's email">
  </div>

  <button class="btn btn-info btn-block my-4" type="submit">Add</button>


</form>
@endsection --}}
<div class="modal fade" id="modaladdnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

        <form action="/addcustomer" class="border border-light p-5">


          <div class="form-group">
            <label for="formGroupExampleInput">Customer Name</label>
            <input type="text" name="name" class="form-control @error('email') is-invalid @enderror"
              id="formGroupExampleInput" value="{{old('name')}}" placeholder="customer's name">
          </div>
          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="formGroupExampleInput2">Phone Number</label>
            <input type="text" name="phone" class="form-control @error('email') is-invalid @enderror"
              value="{{old('phone')}}" id="formGroupExampleInput2" placeholder="Phone number">
          </div>
          @error('phone')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
              value="{{old('email')}}" id="formGroupExampleInput2" placeholder="customer's email">
          </div>
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror


          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-info btn-block my-4" type="submit">Add</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>