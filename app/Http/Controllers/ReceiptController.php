<?php

namespace App\Http\Controllers;

use App\Order;
use App\Receipt;
use PDF;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
   public function store(Order $order,$total){
    $receipt = new Receipt();
    $receipt->employee_id=auth()->user()->id;
    $receipt->receiptable_id=$order->customer->id;
    $receipt->receiptable_type="App\Customer";
    $receipt->type="revenue";
    $receipt->description="tickets payment";
    $receipt->total_amount=$total;
    $receipt->receipt_date=date('Y-m-d');
    $receipt->safe_id='0';
    $receipt->save();
    $payments=session()->get('payment');
    if($payments==null)
    return redirect()->route('order.show',$order)->with('status','select tickets to pay');
    foreach ($payments as $ticket) {
        $id=$ticket['id'];
        $amount=$ticket['amount'];
        $receipt->tickets()->attach("$id",['amount'=>$amount]);
    }
    $order->customer->totalcredit+=$total;
    $name=$order->customer->name;
    $order->customer->save();
    $result = $order->ticketsAmount();
    if($result[1]-$result[2]==0){
        $order->status='1';
        $order->save();
    }
    $pdf = PDF::loadView('wasl',compact('payments','receipt','name'));
    session()->forget('payment');
    return $pdf->download('invoice.pdf');
    
   }
}
