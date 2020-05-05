<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Ticket;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{


  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */



  public function index()
  {
    $today=date('Y-m-d');

    if(auth()->user()->privilege!=3){
    $orders = Order::OrderBy('id', 'desc')->with('customer')->get();
  }
  else{

     $orders = Order::where('status', '0')->with('customer')->get();
  }
  return view("orders.allorders", compact('orders','today'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $customers = Customer::all();
    return view('orders.create', compact('customers'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'date' => 'required | date',
      'payment' => 'in:cash,agl',

    ]);
    if ($request->session()->has('order')) {

      $request->session()->forget(['order', 'tickets']);
    }

    if ($request->payment == 'cash') {
      $request->merge(['customer_id' => 1]);
    }
    $order = Order::create($request->all());
    $request->session()->put('order', $order);
    return redirect()->route('orderticketcreate', [$order, $status = 0]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(Order $order)
  {

    session()->forget('payment');
     if($order->tickets->count()==0){
    $order->delete();
    return redirect()->route('order.index')->with('status','order is empty so it was deleted');
    }
     $orderPaymentInfo=$order->ticketsAmount();
     $data=$orderPaymentInfo[0];
     $total=$orderPaymentInfo[1];
     $payed=$orderPaymentInfo[2];
    return view('orders.show',compact('data','order','total','payed'));
  }

  public function confirmpayment(Order $order, $total)
  {
    $order->customer->totalcredit -= $total;
    $order->customer->save();
    return redirect()->route('order.show', $order);
  }


  public function confirmview(Order $order)
  {
    
    $payed=$order->ticketsAmount()[2];
    if($order->status == 0 && $payed == 0)
    return view('orders.confirm', compact('order'));
    else return redirect()->route("order.index")->with('status','Order already payed');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $order=Order::find($id);
    $payed=$order->ticketsAmount()[2];
    
    if(auth()->user()->privilege==3 && $order->created_at->todatestring() != date('Y-m-d')){
      return redirect()->route("order.index")->with('status','Unauthoized to delete Old order');
    }
    
    else if($order->status == 0 && $payed == 0){
      $order->delete();
      return redirect()->route('order.index')->with('status', 'order deleted successfully');
  }
  else{
    return redirect()->route('order.index')->with('status', 'order Has finished Payments,Only refund is possible');
      }
  }

  public function print(Order $order)
  {
    $total = $order->tickets->sum('sellprice');
    $tickets = $order->tickets;
    $pdf = PDF::loadView('fatoora', compact('order', 'tickets', 'total'));
    return $pdf->stream('invoice.pdf');
  }

  public function payAll(Order $order)
  {
    $orderPaymentInfo = $order->ticketsAmount()[0];

    $allorder = "1";
    $payments = [];
    foreach ($orderPaymentInfo as $ticket) {
      $id = $ticket[0]->id;
      if ($ticket[1] !== 'refunded') {
        $payments["$id"] = ["id" => $ticket[0]->id, "amount" => $ticket[0]->sellprice - $ticket[1]];
      }
    }
    return view('orders.payment', compact('payments', 'order', "allorder"));
  }
}
