<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Order;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.alltickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.createticket');
    }

    public function orderticket(Order $order,$status){

        return view('tickets.createticket',compact('order','status'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {   
        $ticket=$request->except(['again']);
        if ($request->session()->has('tickets')) {

            $request->session()->push('tickets', $ticket);
        }
        else{
            $tickets=[];
            $request->session()->put('tickets',$tickets);
            $request->session()->push('tickets', $ticket);
        }
        $status=1;
        $order=$request->session()->get('order');
        if($request->again==1){
        $status=count($request->session()->get('tickets'));
            return redirect()->route('orderticketcreate',[$order,$status]);
        }
        else {
        $tickets=$request->session()->get('tickets');
        $total=0;
        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
            $total+=$ticket['sellprice'];
        }
        
         $order=Order::where('id',"$order->id")->with('tickets')->first();
         $request->session()->forget(['order', 'tickets']);
         return redirect()->route('orderconfirm',$order);
         
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
       return view('tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTicket $request, Ticket $ticket)
    {  
        $ticket->update($request->all());
        $order=$ticket->order;
        return redirect()->route('orderconfirm',$order)->with('status','ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
       $ticket->delete();
       $order=Order::findorfail($ticket->order_id);
       if($order->tickets->count()==0)
       $order->delete();
       return redirect()->route('order.index')->with('status','order deleted successfully');

       return redirect()->route('orderconfirm',$order)->with('status','ticket deleted successfully');
    }

    public function checkprice( Request $request)
    {   
        if($request->has('undo')){
            $payments=$request->session()->get('payment');
            unset($payments["$request->id"]);
            $request->session()->forget('payment');
            $request->session()->put('payment',$payments);
            return response()->json(['success'=>"Payment Undone"]);
        }
       $ticket=Ticket::findorfail($request->id);
       $result=$ticket->calculate();
       if($result=='already payed'){
           return response()->json(['success'=>"Ticket already Payed"]);
       }
        $validator = Validator::make($request->all(), [
            'amount' => "required  | integer | min:1 | max:$result",
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['success'=>false, 'error'=>$validator->errors()->first()]);
        }

        $pay=$request->all();
        if ($request->session()->has('payment')) {
            $payments=session()->get('payment');
            $payments["$request->id"]=$pay;
            $request->session()->forget('payment');
           $request->session()->put('payment',$payments);
           return response()->json(['success'=>'Payment added to recipt']);
        }else{
            $payments["$request->id"]=$pay;
            $request->session()->put('payment',$payments);
            return response()->json(['success'=>'Payment added to recipt']);
        }

        }


        public function confirmReceipt(){

            if(session('payment')){
                $allorder='0';
              $payments=session('payment');
              $ticket=Ticket::findorfail(current($payments)['id']);
              $order=$ticket->order;
              return view('orders.payment',compact('payments','order','allorder'));
            }
            else return back()->with('status','No payments Added');
          }

    
}
