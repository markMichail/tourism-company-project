@extends('layouts.app')
@section('content')

<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Receipts Reports</h3>
    <div class="card-body">
        <div id="table" class="table-editable">

            <label>Starting From</label>
            <input type="date" id="startingdate" value="{{ date("Y-m-d") }}" class="form-control col col-lg-2">
            <br>

            <button type="button" class="btn btn-success btn-rounded btn-md float-right">Export to excel</button>
            <button type="button" id="print" class="btn btn-warning btn-rounded btn-md float-right">Print</button>
            {{-- <button type="button" class="btn btn-info btn-rounded btn-md float-right">Filter</button> --}}

            <table id="reportsTable" style="width: 100%;"
                class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Destination / Customer</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Total amount</th>
                        <th class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipts as $i => $receipt)
                    <tr>
                        <td class="pt-3-half">{{ ++$i }}</td>
                        <td class="pt-3-half">{{$receipt->receiptable->name}}</td>
                        <td class="pt-3-half">{{$receipt->type}}</td>
                        <td class="pt-3-half">{{$receipt->description}}</td>
                        <td class="pt-3-half">{{$receipt->total_amount}} LE</td>
                        <td class="pt-3-half">{{$receipt->receipt_date}}</td>
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
      var url = '{{ route("receiptsreportprint", "date") }}';
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
      ticketDate = data[5];
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