@extends('layouts.app')
@section('content')

<form class="border border-light p-5">

    <p class="h4 mb-4 text-center">Add Customer</p>

    <div class="form-group">
        <label for="formGroupExampleInput">Customer Name</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="customer's name">
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Phone Number</label>
        <input type="text" class="form-control" id="formGroupExampleInput2"
        placeholder="Phone number">
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Email</label>
        <input type="text" class="form-control" id="formGroupExampleInput2"
        placeholder="customer's email">
      </div>




    <button class="btn btn-info btn-block my-4" type="submit">Add</button>


</form>
@endsection
