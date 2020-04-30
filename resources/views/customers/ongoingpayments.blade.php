@extends('layouts.app')
@section('content')



<!-- Editable table -->
<div style="overflow: hidden;">

@include('customers.sidenav')

<div class="card"  style="float:left; width:80%;">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Ongoing payments</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <table id="dtBasicExample" class="table table-bordered table-responsive-lg table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Person Name</th>
            <th class="text-center">Date</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($ongoingOrders as $ongoingOrder )
          <tr>
            <td class="pt-3-half">{{$ongoingOrder->customer->name}}</td>
            <td class="pt-3-half">{{$ongoingOrder->date}}</td>
            <td class="table-view">
            <a href="/order/{{$ongoingOrder->id}}" class="btn btn-info btn-rounded btn-sm my-0">View</a>
            </td>
          </tr>
          @empty
            <th colspan="4" class="text-center">No customers to show</th>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>


</div>

<div class="modal fade" id="modaladdnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
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

</script>
@endsection
