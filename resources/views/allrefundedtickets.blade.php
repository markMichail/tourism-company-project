@extends('layouts.app')
@section('content')

<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Refunded Tickets</h3>
  <div class="card-body">
    <div id="table" class="table-editable">

      <table id="dtBasicExample" style="max-width: auto;" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">ticket Number	</th>
            <th class="text-center">refund date</th>
          </tr>
        </thead>

        <tbody>
          @foreach($refunded_tickets as $refunded_ticket)
          <tr>
            <td class="pt-3-half">{{ $refunded_ticket-> id }}</td>
            <td class="pt-3-half">{{ $refunded_ticket-> ticket_id }}</td>
            <td class="pt-3-half">{{ $refunded_ticket-> refund_date }}</td>
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

  $tableID.on('click', '.table-remove', function () {
    $(this).parents('tr').detach();
  });

}

</script>
@endsection
