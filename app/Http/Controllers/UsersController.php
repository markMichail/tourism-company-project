<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Ticket;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view("users", compact('users'));
    }

    public function delete(Request $request){
        
        return redirect(route('allusers'))->with('successMsg', 'User Deleted Successfully');
    }
}
