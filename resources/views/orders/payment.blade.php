@extends('layouts.app')


@section('content')
<h3 class="card-header text-center py-4">Receipt summary for order {{$order->id}} </h3>
<h3 class="card-header text-center py-4">customer: {{$order->customer->name}} </h3>
<table style="margin-top:5%" class="table table-bordered table-responsive-lg table-striped text-center">
    <tr>
        <th>ticket ID</th>
        <th>Amount</th>
    </tr>
    @php($total=0)
    @foreach ($payments as $ticket)
    <tr>
        <td>{{$ticket['id']}}</td>
        <td>{{$ticket['amount']}}</td>
        @php($total+=$ticket['amount'])
    </tr>
    @endforeach

</table>
<div class="text-center">
    <div class="alert alert-success">Total::{{  $total}} EGP</div>
  @if($allorder==0)  
  <a class="btn btn-success"  href="{{route('receipts.store',[$order,$total])}}">Confirm</a>
  @else 
  <a class="btn btn-success"  href="{{route('receipts.allorder',[$order,$total])}}">Confirm</a>
  @endif

<a class="btn btn-danger"  href="{{ URL::previous() }}">Go Back</a>
</div>
@endsection