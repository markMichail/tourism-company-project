@extends('layouts.app2')
@section('content')
<br>

<div class="container">
    <!-- Default form contact -->
    <form method="POST" class="text-center border border-light p-5" action="{{ route('tickets.store')}}">
        @csrf
        <p class="h4 mb-4">Add ticket</p>

        <!-- Name -->

        <input type="text" id="passenger_name" value="{{old('passengerName')}}" name="passengerName"
            class="@error('passengerName') is-invalid @enderror form-control mb-4" placeholder="passengerName">
        @error('passengerName')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" id="ticket Number" value="{{old('ticketNumber')}}" name="ticketNumber"
            class="@error('ticketNumber') is-invalid @enderror form-control mb-4" placeholder="ticket Number">
        @error('ticketNumber')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" id="destination" value="{{old('destination')}}" name="destination"
            class="@error('destination') is-invalid @enderror form-control mb-4" placeholder="destination">
        @error('destination')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" id="transportation company" value="{{old('transportationCompany')}}"
            name="transportationCompany" class="@error('transportationCompany') is-invalid @enderror form-control mb-4"
            placeholder="transportation company">
        @error('transportationCompany')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label class="form-contrl" for="type">Type</label>
        <select name="type" id="type" class="@error('type') is-invalid @enderror form-control mb-4" id="type">
            <option value="void">Void</option>
            <option value="credit">Credit</option>
            <option value="ticket">Ticket</option>
        </select>
        @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" value="{{old('rsoom')}}" name="rsoom" onchange="checktotal()" id="rsoom"
            class="@error('rsoom') is-invalid @enderror form-control mb-4" placeholder="rsoom">
        @error('rsoom')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" value="{{old('asasy')}}" name="asasy" onchange="checktotal()" id="asasy"
            class="@error('asasy') is-invalid @enderror form-control mb-4" placeholder="asasy">
        @error('asasy')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" id="percentageAsasy" value="{{old('percentageAsasy')}}" name="percentageAsasy"
            class="@error('percentageAsasy') is-invalid @enderror form-control mb-4" placeholder="%asasy">
        @error('percentageAsasy')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" name="total" value="" id="total" readonly="readonly"
            class="@error('total') is-invalid @enderror form-control mb-4" value="0" placeholder="total">
        @error('total')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <input type="number" id="comission" value="{{old('comission')}}"
            class=" @error('comission') is-invalid @enderror form-control mb-4" name="comission"
            placeholder="comission">
        @error('comission')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="number" id="comissionTax" value="{{old('comissionTax')}}" name="comissionTax"
            class="  @error('comissionTax') is-invalid @enderror form-control mb-4" placeholder="comissioTax">
        @error('comissionTax')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" id="bsp" value="{{old('bsp')}}" name="bsp"
            class="@error('bsp') is-invalid @enderror form-control mb-4" placeholder="BSP">
        @error('bsp')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="number" id="sellprice" onchange="checkprofit()" value="{{old('sellprice')}}" name="sellprice"
            class="@error('sellprice') is-invalid @enderror form-control mb-4" placeholder="sellprice">
        @error('sellprice')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="text" id="profit" value="0" readonly="readonly"
            class="@error('profit') is-invalid @enderror form-control mb-4" value="{{old("profit")}}" name="profit"
            placeholder="profit">

        @error('profit')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" id="safy" class="@error('safy') is-invalid @enderror  form-control mb-4"
            value="{{old("safy")}}" name="safy" placeholder="safy">
        @error('safy')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror




        <select class="form-control" name="paymentType" id="">
            <option value="visa">visa</option>
            <option value="cash">cash</option>
            <option value="check">check</option>
        </select>
        <input name="order_id" value="{{$order->id}}" type="hidden">
        <input name="again" id="again" value="" type="hidden">

        <!-- Send button -->
        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModalCenter" type="button">Add
            ticket</button>




        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                        <input type="submit" onclick="return check()" class="btn btn-success" value="yes">
                        <input type="submit" onclick="return uncheck()" value="no" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>




    <!-- To change the direction of the modal animation change .right class -->
    <div class="modal fade left" id="sideModalTR" {{--data-backdrop="false"--}} tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">

        <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-side modal-bottom-right" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Recipt {{ $order->id ?? ""}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    current added tickets:
                    <div class="badge badge-primary text-wrap" style="width: 3rem;">
                        {{ $status ?? ""}}
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
@if ($status!=0 ?? false)
<script>
    $(document).ready(function(){
      $("#sideModalTR").modal('show');
  });
</script>
@endif


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
  function check(){
    document.getElementById('again').value=1;
    return true;
  }

  function uncheck(){
    
    document.getElementById('again').value= 0;
    return true;
  }

</script>

@endsection