<?php

namespace App\Http\Controllers;

use App\RefundedTicket;
use Illuminate\Http\Request;

class RefundedTicketController extends Controller
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
      $refunded_tickets = RefundedTicket::all();
      return view("allrefundedtickets", compact('refunded_tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\refundedticket  $refundedticket
     * @return \Illuminate\Http\Response
     */
    public function show(refundedticket $refundedticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\refundedticket  $refundedticket
     * @return \Illuminate\Http\Response
     */
    public function edit(refundedticket $refundedticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\refundedticket  $refundedticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, refundedticket $refundedticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\refundedticket  $refundedticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(refundedticket $refundedticket)
    {
        //
    }
}
