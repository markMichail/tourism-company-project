<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Order;
use App\Ticket;
use Illuminate\Http\Request;

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
        Ticket::create($request->except(['again']));
        $status=1;
        if($request->again==1){
        $order=Order::findorfail($request->order_id);
        return redirect()->route('orderticketcreate',[$order,$status]);
        }else {
         $order=Order::where('id',"$request->order_id")->with('tickets')->first();
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
       return redirect()->route('orderconfirm',$order)->with('status','ticket deleted successfully');
    }
}
