@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Tickets</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <!-- <span class="table-add float-right mb-3 mr-2">
        <a href="#!" class="text-success">
          <i class="fas fa-plus fa-2x" aria-hidden="true"></i>
        </a>
      </span> -->
      <table id="dtBasicExample" style="max-width: auto;" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">ticketNumber</th>
            <th class="text-center">type</th>
            <th class="text-center">passenger_name</th>
            <th class="text-center">destination</th>
            <th class="text-center">tran_company</th>
            <th class="text-center">rsoom</th>
            <th class="text-center">asasy</th>
            <th class="text-center">total</th>
            <th class="text-center">comission</th>
            <th class="text-center">comissionTax</th>
            <th class="text-center">BSP</th>
            <th class="text-center">sellprice</th>
            <th class="text-center">profit</th>
            <th class="text-center">safy</th>
            <th class="text-center">paymentType</th>
            <th class="text-center">receipt no</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pt-3-half">1</td>
            <td class="pt-3-half">100000001</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">500 LE</td>
            <td class="pt-3-half">50000004</td>
          </tr>
          <tr>
            <td class="pt-3-half">2</td>
            <td class="pt-3-half">100000002</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">1500 LE</td>
            <td class="pt-3-half">50000004</td>
          </tr>
          <tr>
            <td class="pt-3-half">3</td>
            <td class="pt-3-half">100000003</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">2500 LE</td>
            <td class="pt-3-half">50000004</td>
          </tr>
          <tr>
            <td class="pt-3-half">4</td>
            <td class="pt-3-half">100000004</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">0 LE</td>
            <td class="pt-3-half">50000004</td>
          </tr>
          <tr>
            <td class="pt-3-half">5</td>
            <td class="pt-3-half">100000005</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">320 LE</td>
            <td class="pt-3-half">50000004</td>
          </tr>

          <!-- This is our clonable table line -->
          <tr class="hide">
            <td class="pt-3-half">6</td>
            <td class="pt-3-half">100000006</td>
            <td class="pt-3-half">Mark Gallagher</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">Aurelia Vega</td>
            <td class="pt-3-half">600 LE</td>
            <td class="pt-3-half">50000004</td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn btn-info btn-rounded btn-md float-right">Save</button>
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

  // $('.table-add').on('click', 'i', () => {
  //   const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');
  //   if ($tableID.find('tbody tr').length === 0) {
  //     $('tbody').append(newTr);
  //   }
  //   $tableID.find('table').append($clone);
  // });



  $tableID.on('click', '.table-remove', function () {
    $(this).parents('tr').detach();
  });

}




</script>
@endsection
