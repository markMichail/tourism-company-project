@extends('layouts.app2')
@section('content')




<div style="margin-top: 5%" class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Order {{$order->id}} confirmation.</h3>
  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div id="table" class="table-editable">

      <table id="dtBasicExample" class="table table-bordered table-responsive-lg table-striped text-center">

        <thead>
          <tr>
            <th class="text-center">ticketNumber</th>
            <th class="text-center">type</th>
            <th class="text-center">passenger_name</th>
            <th class="text-center">destination</th>
            <th class="text-center">tran_company</th>
            <th class="text-center">rsoom</th>
            <th class="text-center">asasy</th>
            <th class="text-center">total</th>
            <th class="text-center">comission</th>
            <th class="text-center">comissionTax</th>
            <th class="text-center">BSP</th>
            <th class="text-center">sellprice</th>
            <th class="text-center">profit</th>
            <th class="text-center">safy</th>
            <th class="text-center">paymentType</th>
            <th class="text-center">action</th>
            <th class="text-center">action</th>
          </tr>
        </thead>



        @php($total=0)
        <tbody>
          @foreach ($order->tickets as $ticket)
          <tr>
            <td class="pt-3-half">{{$ticket->ticketNumber}}</td>
            <td class="pt-3-half">{{$ticket->type}}</td>
            <td class="pt-3-half">{{$ticket->passengerName}}</td>
            <td class="pt-3-half">{{$ticket->destination}}</td>
            <td class="pt-3-half">{{$ticket->transportationCompany}}</td>

            <td class="pt-3-half">{{$ticket->rsoom}}</td>
            <td class="pt-3-half">{{$ticket->asasy}}</td>
            <td class="pt-3-half">{{$ticket->total}}</td>

            <td class="pt-3-half">{{$ticket->comission}}</td>
            <td class="pt-3-half">{{$ticket->comissionTax}}</td>
            <td class="pt-3-half">{{$ticket->bsp}}</td>
            <td class="pt-3-half">{{$ticket->sellprice}}</td>

            <td class="pt-3-half">{{$ticket->profit}}</td>
            <td class="pt-3-half">{{$ticket->safy}}</td>
            <td class="pt-3-half">{{$ticket->paymentType}}</td>
            <td class="pt-3-half"><a class="btn btn-primary btn-sm" href="{{route('tickets.edit',$ticket)}}">edit</a>
            </td>
            @php($total+=$ticket->sellprice)
            <form onsubmit='return confirm("Do you want to delete this ticket?");' method="POST" id="myform"
              action="{{route('tickets.destroy',$ticket)}}">
              @csrf
              @method('delete')
              <td class="pt-3-half"><button type="submit" class="btn btn-danger btn-sm">delete</button>
              </td>
            </form>
          </tr>
          @endforeach


        </tbody>
      </table>
      <h3>Order Total:: {{$total}}</h3>
    </div>

  </div>

</div>
<form style="display:inline-block" onsubmit='return confirm("Do you want to delete this order?,all data will be lost");'
  method="POST" action="{{route('order.destroy',$order)}}">
  @csrf
  @method('delete')
  <button type="submit" class="btn btn-danger">delete</button>
</form>
@if($order->customer_id !=1)
<a style="float:right" target="_blank" href="{{route('orderprint',$order)}}" class="btn btn-warning">Print</a>
<div class="text-center">
  <a style="" href="{{route('order.confirmpayment',[$order,$total])}}" class="center btn btn-success"> Confirm and Go to
    payment</a>
</div>
@else
<div class="text-center">
  <a style="" href="{{route('receipts.allorder',[$order,$total])}}" class="center btn btn-success">Payment confirmed
    Print receipt</a>
</div>
@endif
<script>
  window.onload = function () {
  $(document).ready(function () {

  


    $('#dtBasicExample').DataTable(
      {
        "columnDefs": [
          { "orderable": false, "targets":2 },
          { "orderable": false, "targets":3 },
        ],"scrollX": true
      }
    );
    $('.dataTables_length').addClass('bs-select');
  });

  const $tableID = $('#table');



  $tableID.on('click', '.table-remove', function () {
    $(this).parents('tr').detach();
  });

  $tableID.on('click', '.table-view', function () {
    window.location.href = "{{ route('customerprofile') }}";
  });

  // $tableID.on('click', '.table-view', function () {
  //   alert("view page ISA");
  //   // $(this).parents('tr').detach();
  // });
  // Treeview Initialization
$(document).ready(function() {
  $('.treeview-animated').mdbTreeview();
});

@if (count($errors) > 0)
    $('#modaladdnew').modal('show');
    @endif

    


}



</script>
@endsection