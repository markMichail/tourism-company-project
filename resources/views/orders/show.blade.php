@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
<h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Tickets of receipt {{$order->id}}</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <!-- <span class="table-add float-right mb-3 mr-2">
        <a href="#!" class="text-success">
          <i class="fas fa-plus fa-2x" aria-hidden="true"></i>
        </a>
      </span> -->
      <table id="dtBasicExample" style="max-width: auto;" class="table table-bordered table-responsive-md table-striped text-center">
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
                <th class="text-center">receipt no</th>
              </tr>

         
        </thead>

        <tbody>
          
                @foreach ($order->tickets as $ticket)
                <tr>
                <td class="pt-3-half">{{$ticket->passenger_name}}</td>
                <td class="pt-3-half">{{$ticket->destination}}</td>
                <td class="pt-3-half">{{$ticket->sellprice}}</td>
                <td class="pt-3-half">{{$ticket->type}}</td>
            </tr>
                @endforeach
              
           
        </tbody>
      </table>
      <button type="button" class="btn btn-info btn-rounded btn-md float-right">Save</button>
    </div>
  </div>
</div>
<!-- Editable table -->


<script>
window.onload = function () {
  $(document).ready(function () {
    $('#dtBasicExample').DataTable(
      {
        
        "columnDefs": [
          { "orderable": false, "targets":0 },
          { "orderable": true, "targets":1 },

        ],"scrollX": true
      }
    );
    $('.dataTables_length').addClass('bs-select');
  });

  const $tableID = $('#table');

  const newTr = `
  <tr class="hide">
  <td class="pt-3-half">Example</td>
  <td class="pt-3-half">Example</td>

  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button>
  </td>
  </tr>`;

  // $('.table-add').on('click', 'i', () => {
  //   const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');
  //   if ($tableID.find('tbody tr').length === 0) {
  //     $('tbody').append(newTr);
  //   }
  //   $tableID.find('table').append($clone);
  // });



  $tableID.on('click', '.table-remove', function () {
    $(this).parents('tr').detach();
  });

}




</script>
@endsection
