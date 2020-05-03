<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      font-size: 12px;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>

<body>
  <h3 style="text-align: center">Tickets Report</h3>
  <img src="images/logo.jpg" width="100px" style="float:right">
  <h3>Starting Date: {{ $startingdate }}</h3>
  <h3>Ending Date: {{ $dateafter15days }}</h3>
  <br>


  <table class="table table-bordered table-responsive-md table-striped text-center" style="table-layout: fixed">
    <tr>
      <th class="text-center">Ticket #</th>
      <th class="text-center">Type</th>
      <th class="text-center">Passenger Name</th>
      <th class="text-center">Destination</th>
      <th class="text-center">Tran Company</th>
      <th class="text-center">Rsoom</th>
      <th class="text-center">% assay</th>
      <th class="text-center">Asasy</th>
      <th class="text-center">Total</th>
      <th class="text-center">Comission</th>
      <th class="text-center">Comission tax</th>
      <th class="text-center">BSP</th>
      <th class="text-center">Sell Price</th>
      <th class="text-center">Profit</th>
      <th class="text-center">Safy</th>
      <th class="text-center">Payment Type</th>
      <th class="text-center">Order #</th>
    </tr>
    @foreach ($tickets as $i => $ticket)
    <tr>
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
  </table>
  {{-- <div style="float:right">
    <h2>Total: {{$total}}</h2>
  </div> --}}
</body>

</html>