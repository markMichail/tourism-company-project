<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Safe;
use App\Receipt;

class SafeController extends Controller
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
        $receipts = Receipt::all();
        return view("safe", compact('receipts'));
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
    public function store(Request $request){
        $this->validate($request, [
            'destinationname' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required',
            'date' => 'required',
            'type' => 'required'
        ]);
        $userid = Auth::id();
        $receipt = new Receipt;
        $receipt->safe_id = 0;
        $receipt->employee_id = $userid;
        $receipt->destination = $request->destinationname;
        $receipt->total_amount = $request->price;
        $receipt->description = $request->description;
        $receipt->receipt_date = $request->date;
        $receipt->type = $request->type;
        $receipt->save();
        return redirect(route('allsafereciepts'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
