@extends('layouts.app')
@section('content')



<!-- Editable table -->
<div style="overflow: hidden;">

<div class="" style="padding:0%; float:left; width:20%;">

  <div class="treeview-animated border mx-4 my-4" style=" " >
    <h6 class="pt-3 pl-3">Customers</h6>
    <hr>
    <ul class="treeview-animated-list mb-3">
     
      <li>
        <div class="treeview-animated-element opened"> <i class="fas fa-user ic-w mr-1"></i>All customers <span class="badge badge-primary badge-pill">14</span
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
  </div>
<div class="card"  style="float:left; width:80%;">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Customers table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2">
        <a href="#!" class="text-success">
          <i class="fas fa-plus fa-2x" aria-hidden="true"></i>
        </a>
      </span>
      <table id="dtBasicExample" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Person Name</th>
            <th class="text-center">Credit</th>
            <th style="width:10%" class="text-center">View</th>
            <th style="width:10%" class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">500 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">1500 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">-2500 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">0 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">320 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">2000 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">-10000 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">300 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">3000 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Guerra Cortez</td>
            <td class="pt-3-half" contenteditable="true">20 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Guadalupe House</td>
            <td class="pt-3-half" contenteditable="true">700 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>

          <!-- This is our clonable table line -->
          <tr class="hide">
            <td class="pt-3-half" contenteditable="true">Mark Gallagher</td>
            <td class="pt-3-half" contenteditable="true">600 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
               <button type="button" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
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
        
  
<form action="" class="border border-light p-5">


  <div class="form-group">
      <label for="formGroupExampleInput">Customer Name</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="customer's name">
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2">Phone Number</label>
      <input type="text" class="form-control" id="formGroupExampleInput2"
      placeholder="Phone number">
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2">Email</label>
      <input type="text" class="form-control" id="formGroupExampleInput2"
      placeholder="customer's email">
    </div>



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

  const newTr = `
  <tr class="hide">
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
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

}




</script>
@endsection
