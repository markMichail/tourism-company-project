@extends('layouts.app')
@section('content')
<br>

<div class="container">
  <!-- Default form contact -->
  <form method="POST" class="text-center border border-light p-5" action="{{ route('tickets.update',$ticket)}}">
      @csrf
      @method('put')
      <p class="h4 mb-4">Edit ticket</p>

      <!-- Name -->

  <input type="text" id="passenger_name" name="passengerName" value="{{$ticket->passengerName}}" class="@error('passenger_name') is-invalid @enderror form-control mb-4"
          placeholder="passenger_name">
      @error('passenger_name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="text" id="ticket Number" name="ticketNumber" value="{{$ticket->ticketNumber}}" class="@error('ticketNumber') is-invalid @enderror form-control mb-4"
          placeholder="ticketNumber">
      @error('ticketNumber')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  <input type="text" id="destination" name="destination" value="{{$ticket->destination}}" class="@error('destination') is-invalid @enderror form-control mb-4"
          placeholder="destination">
      @error('destination')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="text" id="transportation company" value="{{$ticket->transportationCompany}}" name="transportationCompany"
          class="@error('transportation company') is-invalid @enderror form-control mb-4"
          placeholder="transportation company">
      @error('transportation company')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <label class="form-contrl" for="type">Type</label>
      <select name="type"  class="@error('type') is-invalid @enderror form-control mb-4" id="type">
          <option <?php if($ticket->type=="void") echo"selected";?> value="void">Void</option>
          <option <?php if($ticket->type=="credit") echo"selected";?> value="credit">Credit</option>
          <option <?php if($ticket->type=="ticket") echo"selected";?> value="ticket">Ticket</option>
      </select>
      @error('type')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="number" name="rsoom" value="{{$ticket->rsoom}}" onchange="checktotal()" id="rsoom"
          class="@error('rsoom') is-invalid @enderror form-control mb-4" placeholder="rsoom">
      @error('rsoom')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="number" name="asasy" value="{{$ticket->asasy}}" onchange="checktotal()" id="asasy"
          class="@error('asasy') is-invalid @enderror form-control mb-4" placeholder="asasy">
      @error('asasy')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="number" id="percentageAsasy" value="{{$ticket->percentageAsasy}}" name="percentageAsasy"
          class="@error('percentageAsasy') is-invalid @enderror form-control mb-4" placeholder="%asasy">
      @error('percentageAsasy')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="number" readonly="readonly" name="total" value="{{$ticket->total}}" id="total"   class="@error('total') is-invalid @enderror form-control mb-4" value="0" placeholder="total">
      @error('total')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      
      <input type="number" id="comission" value="{{$ticket->comission}}" class=" @error('comission') is-invalid @enderror form-control mb-4" name="comission" placeholder="comission">
      @error('comission')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      
      <input type="number" id="comissionTax" value="{{$ticket->comissionTax}}" name="comissionTax" class="  @error('comissionTax') is-invalid @enderror form-control mb-4" placeholder="comissioTax">
      @error('comissionTax')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="number" id="bsp" value="{{$ticket->bsp}}" name="bsp" class="@error('bsp') is-invalid @enderror form-control mb-4" placeholder="BSP">
      @error('bsp')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      
      <input type="number" id="sellprice" onchange="checkprofit()" value="{{$ticket->sellprice}}" name="sellprice"  class="@error('sellprice') is-invalid @enderror form-control mb-4" placeholder="sellprice">
      @error('sellprice')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
     
      <input type="text" id="profit" value="0" readonly="readonly"  class="@error('profit') is-invalid @enderror form-control mb-4" value="{{$ticket->profit}}" name="profit" placeholder="profit">

      @error('profit')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input type="text" id="safy" class="@error('safy') is-invalid @enderror  form-control mb-4" value="{{$ticket->safy}}" name="safy" placeholder="safy">
      @error('safy')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <select class="form-control"  name="paymentType" id="">
      <option <?php if($ticket->paymentType=='visa') echo"selected";?> value="visa">visa</option>  
      <option <?php if($ticket->paymentType=='cash') echo"selected";?> value="cash">cash</option>  
      <option <?php if($ticket->paymentType=='check') echo"selected";?> value="check">check</option>  
      </select>
      <input name="order_id" value="{{$ticket->order_id}}" type="hidden">

    
      <!-- Send button -->
      <button class="btn btn-info btn-block" type="submit">Update
          ticket</button>
      
         </div>
<script>
  function checktotal(){
    var rsoom =document.getElementById('rsoom').value;
    var asasy=document.getElementById('asasy').value;
    if(rsoom=="")
    rsoom=0;
    else if(asasy=="")
    asasy=0;

  document.getElementById('total').value=parseInt(rsoom)+parseInt(asasy);

  }


  function checkprofit(){
  var sellprice =document.getElementById('sellprice').value;
  var total=document.getElementById('total').value;
  if(sellprice=="")
  sellprice=0;
  else if(total=="")
  total=0;

  document.getElementById('profit').value=parseInt(total)-parseInt(sellprice);

  }

</script>

@endsection
