@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Receipts table</h3>
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
            <th class="text-center">#</th>
            <th class="text-center">Price</th>
            <th class="text-center">View</th>
            <th class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pt-3-half">50000004</td>
            <td class="pt-3-half">500 LE</td>
            <td class="table-view">
              <button type="button" class="btn btn-info btn-rounded btn-sm my-0">View</button>
            </td>
            <td class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
            </td>
          </tr>
          <tr>
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
          </tr>

          <!-- This is our clonable table line -->
          <tr class="hide">
            <td class="pt-3-half">50000014</td>
            <td class="pt-3-half">600 LE</td>
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

  $tableID.on('click', '.table-remove', function () {
    $(this).parents('tr').detach();
  });

  $tableID.on('click', '.table-view', function () {
    window.location.href = "{{ route('viewreceiptdetails') }}";
  });

  // $tableID.on('click', '.table-view', function () {
  //   alert("view page ISA");
  //   // $(this).parents('tr').detach();
  // });

}




</script>
@endsection
