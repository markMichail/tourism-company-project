@extends('layouts.app')
@section('content')



<!-- Editable table -->
<div style="overflow: hidden;">

  @include('customers.sidenav')

  <div class="card" style="float:left; width:80%;">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Customers table</h3>
    <div class="card-body">
      <div id="table">

        <table id="dtBasicExample" class="table table-bordered table-responsive-lg table-striped text-center">
          <thead>
            <tr>
              <th class="text-center">Person Name</th>
              <th class="text-center">Credit</th>
              <th style="" class="text-center">View</th>
              <th style="" class="text-center">Edit</th>
              <th style="" class="text-center">Remove</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($customers as $customer )
            <tr>
              <td class="pt-3-half">{{$customer->name}}</td>
              <td class="pt-3-half">{{$customer->totalcredit}}</td>
              <td class="table-view">
                <a href="customers/{{ $customer->id}}"> <button type="button"
                    class="btn btn-info btn-rounded btn-sm my-0">View</button>
                </a></td>
              <td class="table-view">
                <a href="edit/{{ $customer->id}}"> <button type="button"
                    class="btn btn-info btn-rounded btn-sm my-0">Edit</button>
                </a></td>
              <td class="table-remove">
                <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash"
                    aria-hidden="true"></i></button>
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
@include('customers.addcustomer')

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