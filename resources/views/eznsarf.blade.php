<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
</head>
<body>
<img src="images/logo.jpg" width="100px" style="float:right" alt="">
<h3>Cash exchange permission</h3>
<h3>Date: {{$receipt->date}}</h3>
<h3>receipt Number: {{$receipt->id}}</h3>
<h3>To client: {{$receipt->receiptable->name}}</h3>
<h3>For: Tickets refund</h3>

<table>
    <tr>
    <th>ticket number</th>
    <th>amount</th>
  </tr>

    @foreach ($receipt->tickets as $ticket)
    <tr>
        <td>{{$ticket->ticketNumber}}</td>
        <td>{{$ticket->pivot->amount}}</td>
      </tr>
    @endforeach
  
</table>
<div style="float:right">
<h2>Total: {{$receipt->total_amount}}</h2>
</div>
</body>
</html>
