@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Orders table</h3>
  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2">
        <a href="#!" class="text-success">
          <i class="fas fa-plus fa-2x" aria-hidden="true"></i>
        </a>
      </span>
      <table id="DBTable" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Total</th>
            <th class="text-center">Date</th>
            <th style="width:10%" class="text-center">View</th>
            <th style="width:10%" class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td class="pt-3-half">{{ $order->id }}</td>
            <td class="pt-3-half">{{ $order->total }}</td>
            <td class="pt-3-half">{{ $order->date }}</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <form onsubmit='return confirm("Do you want to delete this ticket?");' method="POST"
              action="{{route('order.destroy',$order)}}">
              @csrf
              @method('delete')
              <td class="remove-table"><button type="submit" class="btn btn-danger btn-sm">delete</button></td>
            </form>
          </tr>
          @endforeach
          <!-- <tr>
          <td class="pt-3-half">50000005</td>
          <td class="pt-3-half">1500 LE</td>
          <td class="table-view">
          <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
        </td>
        <td class="table-remove">
        <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
      </td>
    </tr>
    <tr>
    <td class="pt-3-half">50000009</td>
    <td class="pt-3-half">2500 LE</td>
    <td class="table-view">
    <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
  </td>
  <td class="table-remove">
  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000000</td>
<td class="pt-3-half">0 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000008</td>
<td class="pt-3-half">320 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000008</td>
<td class="pt-3-half">2000 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000008</td>
<td class="pt-3-half">10000 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000006</td>
<td class="pt-3-half">300 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000008</td>
<td class="pt-3-half">3000 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000007</td>
<td class="pt-3-half">20 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr>
<tr>
<td class="pt-3-half">50000009</td>
<td class="pt-3-half">700 LE</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr> -->

          <!-- This is our clonable table line -->
          <!-- <tr class="hide">
<td class="pt-3-half">50000014</td>
<td class="pt-3-half">600 LE</td>
<td class="pt-3-half">29-10-2019</td>
<td class="table-view">
<button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
</td>
<td class="table-remove">
<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
</td>
</tr> -->
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Confirmation</h2>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Editable table -->


<script>
  window.onload = function () {
  $(document).ready(function () {
    $('#DBTable').DataTable(
      {
        "columnDefs": [
          { "orderable": false, "targets":3 },
          { "orderable": false, "targets":4 },
        ],
      }
    );
    $('.dataTables_length').addClass('bs-select');
  });

  const $tableID = $('#table');

  const newTr = `
  <tr class="hide">
  <td class="pt-3-half">Example</td>
  <td class="pt-3-half">Example</td>
  <td class="table-remove">
  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button>
  </td>
  </tr>`;

  $('.table-add').on('click', 'i', () => {
    const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');
    if ($tableID.find('tbody tr').length === 0) {
      $('tbody').append(newTr);
    }
    $tableID.find('table').append($clone);
  });

  $tableID.on('click', '.table-remove', function(){
    user_id = $(this).parents("tr").children("td:first").text();
    row = $(this).parents('tr');
    $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
    $.ajax({
      url:"order/delete/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        $('#confirmModal').modal('hide');
        row.detach();
      }
    })
  });

  $tableID.on('click', '.table-view', function () {
    window.location.href = "{{ route('vieworderdetails') }}";
  });

  // $tableID.on('click', '.table-view', function () {
  //   alert("view page ISA");
  //   // $(this).parents('tr').detach();
  // });

}

</script>
@endsection