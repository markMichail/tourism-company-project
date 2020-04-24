@extends('layouts.app')
@section('content')



<!-- Editable table -->

<div class="card">
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
                        <th colspan="2" class="text-center">action</th>
                    </tr>
                </thead>




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
                        <td class="pt-3-half"><a class="btn btn-primary btn-sm"
                                href="{{route('tickets.edit',$ticket)}}">edit</a></td>
                        <form onsubmit='return confirm("Do you want to delete this ticket?");' method="POST"
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
        </div>
    </div>
</div>




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
            </div>



        </div>
    </div>
</div>







<script>
    window.onload = function () {
  $(document).ready(function () {
    $('#dtBasicExample').DataTable(
      {
        "columnDefs": [
          { "orderable": false, "targets":2 },
          { "orderable": false, "targets":3 },
        ],
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