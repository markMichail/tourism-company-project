@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Tickets</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <table id="allTicktesTable" style="max-width: auto;" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">ticketNumber</th>
            <th class="text-center">type</th>
            <th class="text-center">passenger name</th>
            <th class="text-center">destination</th>
            <th class="text-center">tran company</th>
            <th class="text-center">rsoom</th>
            <th class="text-center">percentage assay</th>
            <th class="text-center">asasy</th>
            <th class="text-center">total</th>
            <th class="text-center">comission</th>
            <th class="text-center">comission tax</th>
            <th class="text-center">BSP</th>
            <th class="text-center">sellprice</th>
            <th class="text-center">profit</th>
            <th class="text-center">safy</th>
            <th class="text-center">paymentType</th>
            <th class="text-center">receipt no</th>
          </tr>
          <tr id="filter">
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
            <th class="text-center"><select><option value=""></option></select></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $i => $ticket)
          <tr style="cursor: pointer;">
            
            <td class="pt-3-half">{{ ++$i }}</td>
            <td class="pt-3-half">{{$ticket->id}}</td>
            <td class="pt-3-half">{{$ticket->type}}</td>
            <td class="pt-3-half">{{$ticket->passengerName}}</td>
            <td class="pt-3-half">{{$ticket->destination}}</td>
            <td class="pt-3-half">{{$ticket->transportationCompany}}</td>
            <td class="pt-3-half">{{$ticket->rsoom}}</td>
            <td class="pt-3-half">{{$ticket->percentageAsasy}}</td>
            <td class="pt-3-half">{{$ticket->asasy}}</td>
            <td class="pt-3-half">{{$ticket->total}}</td>
            <td class="pt-3-half">{{$ticket->comission}}</td>
            <td class="pt-3-half">{{$ticket->comissionTax}}</td>
            <td class="pt-3-half">{{$ticket->bsp}}</td>
            <td class="pt-3-half">{{$ticket->sellprice}}</td>
            <td class="pt-3-half">{{$ticket->profit}}</td>
            <td class="pt-3-half">{{$ticket->safy}} LE</td>
            <td class="pt-3-half">{{$ticket->paymentType}}</td>
            <td class="pt-3-half">{{$ticket->order_id}}</td>
          
          </tr>
        
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->
<script>
window.onload = function () {
  $(document).ready(function () {
    var table = $('#allTicktesTable').DataTable({
      order: [[0, 'asc']],
      pagingType: 'full_numbers',
      scrollX : true,
      orderCellsTop: true,
      initComplete: function() {
        this.api().columns().every( function(i) {
          var column = this;
          column.data().draw(false).unique().sort().each(function(d, j){
            $('#filter th:eq('+i+') select').append('<option value="'+d+'">'+d+"</option>")
          });
          $('#filter th:eq('+i+') select').on('change', function() {
            column.search( this.value ).draw();
          });
        });
      },
      fnDrawCallback: function () {
          $('#allTicktesTable tbody tr').click(function () {
            id = $(this).children('td:eq(17)').html();
            document.location.href = '/order/' + id
            })
          }
      });
    $('.dataTables_length').addClass('bs-select');
  });
}
</script>
@endsection
