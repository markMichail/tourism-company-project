@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
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
            <th class="text-center">View</th>
            <th class="text-center">Remove</th>
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
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">1500 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">-2500 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">0 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">320 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">2000 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">-10000 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">300 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">3000 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Guerra Cortez</td>
            <td class="pt-3-half" contenteditable="true">20 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">Guadalupe House</td>
            <td class="pt-3-half" contenteditable="true">700 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
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
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
        </tbody>
      </table>
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

}




</script>
@endsection
