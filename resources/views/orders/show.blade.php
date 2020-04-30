@extends('layouts.app')
@section('content')



<!-- Editable table -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">order no. {{$order->id}} of customer
    {{$order->customer->name}} </h3>

  <h3 class="text-center font-weight-bold py-4">Order Total: {{$total}}</h3>
  @if($order->status==1)
  <h3 class="text-center py-4" style="color:green">All tickets Payed</h3>
  @endif
  <h3 class="text-center py-4" style="color:green" id="infomessage"></h3>
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
  <div style="margin:auto">
    <a id="confirmpayment" href="{{route('order.receipt.confirm')}}" style="display: none"
      class="btn btn-success btn-lg">Confirm Payment</a>
  </div>
  <div class="card-body">
    <div id="table" class="table-editable">

      <table id="dtBasicExample" class="table table-bordered table-responsive-lg table-striped text-center">

        <thead>
          <tr>
            <th class="text-center">ticketID</th>
            <th class="text-center">ticketNumber</th>
            <th class="text-center">passenger_name</th>
            <th class="text-center">sellprice</th>
            <th class="text-center">Payed</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Submit</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($data as $ticket)
          <tr>

            <td class="pt-3-half">{{$ticket[0]->id}}</td>
            <td class="pt-3-half">{{$ticket[0]->ticketNumber}}</td>
            <td class="pt-3-half">{{$ticket[0]->passengerName}}</td>
            <td class="pt-3-half">{{$ticket[0]->sellprice}}</td>
            <td class="pt-3-half">{{$ticket[1]}}</td>
            <form>
              <td><input class="form-control -sm" id="{{$ticket[0]->id}}" value="{{$ticket[0]->sellprice-$ticket[1]}}"
                  type="input"></td>
              <td><button class="btn btn-primary btn-sm"  onclick="checkprice({{$ticket[0]->id}},this)" value="0"
                  type="submit">Submit</button></td>
            </form>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="btn-group" role="group">
        @if($order->status==0)
        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Pay
        </button>
        @endif
        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
          {{-- <a class="dropdown-item" disabled href="#">All order</a> --}}
          <a class="dropdown-item" id="payTickets" onclick="showform()" href="#">Tickets</a>
          {{-- <a class="dropdown-item" disabled href="#">Part of Ticket</a> --}}
        </div>
      </div>
      <input class="btn btn-warning" value="Refund" type="button">
    </div>

  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
  window.onload = function () {
  $(document).ready(function () {
    $('#dtBasicExample').DataTable(
      {
        "columnDefs": [
          { "orderable": false, "targets":2 },
          { "orderable": false, "targets":3 },
          { "visible": false, "targets":[5,6]}
        ],
      }
    );
    $('.dataTables_length').addClass('bs-select');

    $("#payTickets").click(function(){
      $("#check").fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);
      $("#check").stop().css("background-color", "#FFFF9C")
    .animate({ backgroundColor: "#FFFFFF"}, 1500);
            });

  });

  const $tableID = $('#table');


}

function showform(){
  var table = $('#dtBasicExample').DataTable();
table.columns( [5,6] ).visible( true );
document.getElementById('infomessage').innerHTML="please select the Tickets to pay with Amount";
document.getElementById('confirmpayment').style.display='';


}

</script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
  function checkprice(id,button){
   var buttonn=button;
    var amount=document.getElementById(id).value;
    
                 if(buttonn.value==0){
                 $.ajax({
                type:'POST',
                url:"/checkticketprice",
                data: { '_token':'<?php echo csrf_token() ?>', 'id': id ,'amount':amount },
                success:function(data) {
                  if(data.success){
                    if(data.success=="Payment added to recipt"){
                    buttonn.value='1';
                    buttonn.innerHTML="Undo";
                    buttonn.className = button.className.replace("btn btn-primary btn-sm", "btn btn-warning btn-sm");
                    document.getElementById(id).disabled="true";
                    }
                  document.getElementById('infomessage').innerHTML=data.success;
                  }
                   else if(data.error) {
                  document.getElementById('infomessage').innerHTML=data.error;
                  }
                }
                
             });
                 }
                 else{
                  $.ajax({
                type:'POST',
                url:"/checkticketprice",
                data: { '_token':'<?php echo csrf_token() ?>', 'id': id ,'amount':amount ,'undo':1 },
                success:function(data) {
                  if(data.success){
                    if(data.success=="Payment Undone"){
                    buttonn.value='0';
                    buttonn.innerHTML="submit";
                    buttonn.className = button.className.replace("btn btn-warning btn-sm","btn btn-primary btn-sm");
                    document.getElementById(id).disabled="";
                    }
                  document.getElementById('infomessage').innerHTML=data.success;
                  }
                   else if(data.error) {
                  document.getElementById('infomessage').innerHTML=data.error;
                  }
                }
                
             });

                 }

 }

//  <script>
//         $(document).ready(function(){
//             var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//             $("#postt").click(function(){
//                 $.ajax({
//                     /* the route pointing to the post function */
//                     url: '/checkticketprice',
//                     type: 'POST',
//                     /* send the csrf-token and the input to the controller */
//                     data: {_token: CSRF_TOKEN, message:'hii'},
//                     dataType: 'JSON',
//                     /* remind that 'data' is the response of the AjaxController */
//                     success: function (data) {
//                         $(".writeinfo").append(data.msg);
//                     }
//                 });
//             });
//        });
//     
</script>


</script>
@endsection