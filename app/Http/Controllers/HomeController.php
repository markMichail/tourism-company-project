<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date=strtotime(date('Y-m-d'));
        $datebefore15days = date('Y-m-d',strtotime('-15 days',$date));
        $data = [];
        $data['customers'] = Customer::all()->count();
        $data['tickets'] = Ticket::all()->count();
        $data['refundedTickets'] = Ticket::where('type','refunded')->count();
        $data['latePayments'] = Order::where('date', '<', $datebefore15days)->count();
        return view('home', compact('data'));
    }
}
