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
  <h3 style="text-align: center">Receipts Report</h3>
  <img src="images/logo.jpg" width="100px" style="float:right">
  <h3>Starting Date: {{ $startingdate }}</h3>
  <h3>Ending Date: {{ $endingdate }}</h3>
  <br>


  <table class="table table-bordered table-responsive-md table-striped text-center" style="table-layout: fixed">
    <tr>
      <th class="text-center">#</th>
      <th class="text-center">Destination / Customer</th>
      <th class="text-center">Type</th>
      <th class="text-center">Description</th>
      <th class="text-center">Total amount</th>
      <th class="text-center">Date</th>
    </tr>
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
  </table>
  {{-- <div style="float:right">
    <h2>Total: {{$total}}</h2>
  </div> --}}
</body>

</html>