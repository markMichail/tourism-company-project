@extends('layouts.app')
@section('content')

<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Refunded Tickets</h3>
  <div class="card-body">
    <div id="table" class="table-editable">

      <table id="refundedTicketsTable" style="max-width: auto;"
        class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center" width="20%">#</th>
            <th class="text-center" width="20%">ticket Number </th>
            <th class="text-center" width="30%">refund date</th>
            <th style="display: none"></th>
          </tr>
        </thead>

        <tbody>
          @foreach($refunded_tickets as $i => $refunded_ticket)
          <tr style="cursor: pointer;">
            <td class="pt-3-half">{{ ++$i }}</td>
            <td class="pt-3-half">{{ $refunded_ticket->id }}</td>
            <td class="pt-3-half">{{ date_format($refunded_ticket->updated_at,"Y-m-d") }}</td>
            <td style="display: none">{{$refunded_ticket->order_id}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- <button type="button" class="btn btn-info btn-rounded btn-md float-right">Save</button> -->
    </div>
  </div>
</div>


<script>
  window.onload = function () {
  $(document).ready(function () {
    $('#refundedTicketsTable').DataTable(
      {

        "columnDefs": [
          { "orderable": false, "targets":0 },
          { "orderable": true, "targets":1 },

        ],
        "scrollX": true,
        fnDrawCallback: function () {
          $('#refundedTicketsTable tbody tr').click(function () {
            id = $(this).children('td:eq(3)').html();
            document.location.href = '/order/' + id
            })
          },
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

  $tableID.on('click', '.table-remove', function () {
    $(this).parents('tr').detach();
  });

}

</script>
@endsection