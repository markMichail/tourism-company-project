<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;


class DestinationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.alldestinations', compact('destinations'));
    }


    public function create()
    {
        return view('destinations.adddestination');
    }

    public function store(Request $request)
    {
        $destination = new Destination();
        $this->validate($request, [
            'name' => 'required | min:3',
            'phone' => 'required | numeric | digits:11',
        ]);

        $destination->name = $request->name;
        $destination->phone = $request->phone;

        $destination->save();
        return redirect('alldestinations');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id);
        return view('destinations.editdestination', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);
        $this->validate($request, [
            'name' => 'required | min:3',
            'phone' => 'required | numeric | digits:11',
        ]);

        $destination->name = $request->name;
        $destination->phone = $request->phone;

        $destination->save();
        return redirect('alldestinations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return back()->with('deleted', 'Destination deleted');
    }
}
