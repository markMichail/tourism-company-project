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
      <table id="DBTable" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Customer</th>
            <th class="text-center">Date</th>
            <th class="text-center">status</th>
            <th style="width:10%" class="text-center">View</th>
          
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td class="pt-3-half">{{ $order->id }}</td>
            <td class="pt-3-half">{{ $order->customer->name }}</td>
            <td class="pt-3-half">{{ $order->date }}</td>
            @if($order->status == 1)
            <td class="alert alert-success col-0">Payed</td>
            @else
            <td class="alert alert-warning"> In progress </td>
            @endif
            <td class="table-view">
              <a href="{{route('order.show',$order)}}" class="btn btn-info btn-rounded btn-sm my-0">View</a>
              @if(Auth::user()->privilege == '3' and $order->date==$today)
              <form style="display:inline-block" onsubmit='return confirm("Do you want to delete this order?,all data will be lost");' method="POST"
              action="{{route('order.destroy',$order)}}">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-rounded btn-sm my-1">delete</button>
              </form>
              @endif
            </td>
            {{-- <form onsubmit='return confirm("Do you want to delete this ticket?");' method="POST"
              action="{{route('order.destroy',$order)}}">
              @csrf
              @method('delete')
              <td class="remove-table"><button type="submit" class="btn btn-danger btn-sm">delete</button></td>
            </form> --}}
          </tr>
          @endforeach
  
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


  // $tableID.on('click', '.table-view', function () {
  //   alert("view page ISA");
  //   // $(this).parents('tr').detach();
  // });

}

</script>
@endsection