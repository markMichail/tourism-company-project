@extends('layouts.app')
@section('content')



<!-- Editable table -->
<div style="overflow: hidden;">

  <div class="treeview-animated border mx-4 my-4" style="padding:0%; float:left; width:15% ">
    <h6 class="pt-3 pl-3">Customers</h6>
    <hr>
    <ul class="treeview-animated-list mb-3">
     
      <li>
        <div class="treeview-animated-element opened"> <i class="fas fa-user ic-w mr-1"></i>All customers <span class="badge badge-primary badge-pill">{{$count}}</span
      </li>
      <li>
        <div  class="treeview-animated-element"><i class="fas fa-money-check-alt"></i> Ongoing payments. <span class="badge badge-primary badge-pill">4</span
      </li>
      <li>
        <div class="treeview-animated-element"><i class="fas fa-clock ic-w mr-1"></i>Late payments <span class="badge badge-primary badge-pill">1</span
      </li>
      <li>
        <div data-toggle="modal" data-target="#modaladdnew"  class="treeview-animated-element"><i class="fas fa-user-plus"></i> add new
      </li>
    </ul>
  </div>
  
<div class="card"  style="float:left; width:80%;">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Customers table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
     
      <table id="dtBasicExample" class="table table-bordered table-responsive-lg table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Person Name</th>
            <th class="text-center">Credit</th>
            <th style="" class="text-center">View</th>
            <th style="" class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($customers as $customer )
          <tr>
            <td class="pt-3-half" contenteditable="true">{{$customer->name}}</td>
            <td class="pt-3-half" contenteditable="true">{{$customer->totalcredit}}</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
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
        
  
<form action="/addcustomer" class="border border-light p-5">


  <div class="form-group">
      <label for="formGroupExampleInput">Customer Name</label>
      <input type="text" name="name" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput" value="{{old('name')}}" placeholder="customer's name">
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="formGroupExampleInput2">Phone Number</label>
      <input type="text" name="phone" class="form-control @error('email') is-invalid @enderror" value="{{old('phone')}}" id="formGroupExampleInput2"
      placeholder="Phone number">
    </div>
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="formGroupExampleInput2">Email</label>
      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="formGroupExampleInput2"
      placeholder="customer's email">
    </div>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="modal-footer d-flex justify-content-center">
  <button class="btn btn-info btn-block my-4" type="submit">Add</button>
</div>

</form>
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
