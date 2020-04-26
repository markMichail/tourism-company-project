@extends('layouts.app')
@section('content')



<!-- Editable table -->

<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">order no. {{$order->id}} of customer
    {{$order->customer->name}} </h3>

  <h3 class="text-center font-weight-bold py-4">Order Total: {{$total}}</h3>
  <div class="card-body">
    <div id="table" class="table-editable">

      <table id="dtBasicExample" class="table table-bordered table-responsive-lg table-striped text-center">

        <thead>
          <tr>
            <th class="text-center">ticketNumber</th>
            <th class="text-center">passenger_name</th>
            <th class="text-center">sellprice</th>
            <th class="text-center">Payed</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($data as $ticket)
          <tr>
            <td class="pt-3-half">{{$ticket[0]->ticketNumber}}</td>
            <td class="pt-3-half">{{$ticket[0]->passenger_name}}</td>
            <td class="pt-3-half">{{$ticket[0]->sellprice}}</td>
            <td class="pt-3-half">{{$ticket[1]}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <input class="btn btn-success" value="Pay" type="button">
      <input class="btn btn-alert" value="Refund" type="button">
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