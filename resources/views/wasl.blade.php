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
<h3>Date: {{$receipt->receipt_date}}</h3>
<h3>receipt Number: {{$receipt->id}}</h3>
<h3>client: {{$name}}</h3>


<table>
    <tr>
    <th>ticket number</th>
  <th>sell price</th>
  </tr>
  @php($total=0)
  @foreach ($payments as $ticket)
  <tr>
      <td>{{$ticket['id']}}</td>
      <td>{{$ticket['amount']}}</td>
      @php($total+=$ticket['amount'])
  </tr>
  @endforeach
  
</table>
<div style="float:right">
<h2>Total: {{$total}}</h2>
</div>
</body>
</html>
