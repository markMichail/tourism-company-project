@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:30px">
  <h3 class="text-center">{{$customer->name}}</h3>
  <hr>
  <div class="row">
    <div class="col-sm-4">
      <h2>Info</h2>
      <br>
      <div><i class="fas fa-phone-alt"></i> {{$customer->phone}}</div>
      <div><i class="fas fa-envelope"></i> {{$customer->email}}</div>
      <hr>
      <h3>Total <span style="color:red; font-size:1.6em;">{{$customer->totalcredit}}</span></h3>
    </div>
    <div class="col-sm-8">
      <h2>Notes</h2>
      <form method="POST">
        {{ csrf_field() }}
        <textarea class="form-control" name="note" rows="10" cols="80">{{$customer->note}}</textarea>
        @if(session('status'))
        <br>
        <div class="alert alert-success" role="alert">
          {{ Session::get('status') }}
        </div>
        @endif
        <input type="submit" class="btn btn-info" value="Save">
      </form>
      <br>
    </div>
  </div>
  <br>
  <div class="row text-center">
    <div class="table table-bordered">
      <table id="tablePreview" class="table table-responsive">
        <thead>
          <tr class="white-text" style="background-color:#378B92;">
            <th colspan="2" width="30%">In progress</th>
            <th colspan="2" width="30%">Paid</th>
            <th colspan="2" width="30%">Refund</th>
          </tr>
          <tr class="black white-text">
            <th class="col-6">Order No.</th>
            <th class="col-6">Price</th>
            <th class="col-6">Receipt No</th>
            <th class="col-6">Price</th>
            <th class="col-6">Receipt No</th>
            <th class="col-6">Price</th>
          </tr>

        </thead>
        <tbody>
          <tr>
            <td class="col-12">500000001</td>
            <td class="col-12">14000 LE</td>
            <td class="col-12">500000001</td>
            <td class="col-12">14000 LE</td>
            <td class="col-12">500000001</td>
            <td class="col-12">14000 LE</td>
          </tr>
          <tr>
            <td class="col-6">500000004</td>
            <td class="col-6">12000 LE</td>
            <td class="col-6">500000004</td>
            <td class="col-6">12000 LE</td>
            <td class="col-6">500000004</td>
            <td class="col-6">12000 LE</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" class="col-12">Total: 14300 LE</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection
