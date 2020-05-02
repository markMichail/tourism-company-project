<?php

namespace App\Http\Controllers;

use App\Ticket;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('order')->get();
        return view('reports', compact('tickets'));
    }
}
