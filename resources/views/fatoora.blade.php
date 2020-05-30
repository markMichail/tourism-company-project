<!DOCTYPE html>
<html>
<head>
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
<h3>Date: {{$order->date}}</h3>
<h3>Bill Number: {{$order->id}}</h3>
<h3>client: {{$order->customer->name}}</h3>


<table>
    <tr>
    <th>ticket number</th>
    <th>destination</th>
  <th>sell price</th>
  </tr>

    @foreach ($tickets as $ticket)
    <tr>
        <td>{{$ticket->ticketNumber}}</td>
        <td>{{$ticket->destination}}</td>
        <td>{{$ticket->sellprice}}</td>
      </tr>
    @endforeach
  
</table>
<div style="float:right">
<h2>Total: {{$total}}</h2>
</div>
</body>
</html>
