@extends('layouts.app')
@section('content')

<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Tickets Reports</h3>
  <div class="card-body">
    <div id="table" class="table-editable">


      <label>Starting From</label> - Report period: {{ $period }} days
      <input type="date" id="startingdate" value="{{ date("Y-m-d") }}" class="form-control col col-lg-2">
      <br>

      <button type="button" id="export" class="btn btn-success btn-rounded btn-md float-right">Export to excel</button>
      <button type="button" id="print" class="btn btn-warning btn-rounded btn-md float-right">Print</button>
      {{-- <button type="button" class="btn btn-info btn-rounded btn-md float-right">Filter</button> --}}

      <table id="reportsTable" style="max-width: auto;"
        class="table table-bordered table-responsive-md table-striped text-center">
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
            <th class="text-center">order no</th>
            <th style="display: none"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $i => $ticket)
          <tr>

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
            <td style="display:none;">{{ $ticket->order->date }}</td>

          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    $('#print').on('click', function(){
      var url = '{{ route("ticketsreportprint", "date") }}';
      url = url.replace('date', $('#startingdate').val());
      window.location.href = url;
    });

    $('#export').on('click', function(){
      var url = '{{ route("ticketsreportexport", "date") }}';
      url = url.replace('date', $('#startingdate').val());
      window.location.href = url;
    });

    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
      var now = $('#startingdate').val();
      var after15days = new Date(now);
      after15days.setDate(after15days.getDate()+15);
      var d = after15days.getDate();
      d = d < 10 ? "0" + d : d;
      var m =  after15days.getMonth();
      m += 1;  // JavaScript months are 0-11
      m = m < 10 ? "0" + m : m;
      var y = after15days.getFullYear();
      after15days = y+"-"+m+"-"+d;
      ticketDate = data[18];
      return now <= ticketDate   && ticketDate <= after15days ? true : false;
    });
    var table = $('#reportsTable').DataTable(
      {  
        "scrollX": true,
        initComplete: function() {
          $('#startingdate').on('change', function() {
            table.draw();
          });
      },
      }
    );
    $('.dataTables_length').addClass('bs-select');
  });
</script>
@endsection