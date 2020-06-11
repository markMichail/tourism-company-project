<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::where('privilege', '<>', '1')->get();
        return view('users.allusers', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->email == $user->email) {
            $this->validate($request, [
                'name' => 'required | min:3',
                'phone' => 'required | numeric',
            ]);

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;

            $user->save();
            return redirect('allusers');
        } else {
            $this->validate($request, [
                'name' => 'required | min:3',
                'phone' => 'required | numeric',
                'email' => 'email  | unique:users',
            ]);

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;

            $user->save();
            return redirect('allusers');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('deleted', 'user deleted');
    }
}
