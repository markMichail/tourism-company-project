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
    $orders = Order::OrderBy('id','desc')->with('customer')->get();
    return view("orders.allorders", compact('orders'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $customers=Customer::all();
    return view('orders.create',compact('customers'));
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
      if($request->payment=='cash'){
        $request->customer_id='0';
      }
     $order= Order::create($request->all());
     return redirect()->route('orderticketcreate',[$order,$status=1]);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Order  $order
  * @return \Illuminate\Http\Response
  */
  public function show(Order $order)
  {
     $data=$order->ticketsAmount()[0];
     $total=$order->ticketsAmount()[1];
    return view('orders.show',compact('data','order','total'));
  }
  

  public function confirmview(Order $order)
  {
    return view('orders.confirm',compact('order'));
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
    Order::find($id)->delete();
    return redirect()->route('order.index')->with('status','order deleted successfully');
  }

  public function print(Order $order){
    $total=$order->tickets->sum('sellprice');
    $tickets=$order->tickets;
    $pdf = PDF::loadView('fatoora',compact('order','tickets','total'));
    return $pdf->stream('invoice.pdf');

  }
}
