<?php

namespace App\Http\Controllers;

use App\Ticket;
use PDF;

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

    public function printTickets($date)
    {
        $startingdate = $date;
        $date = strtotime($date);
        $dateafter15days = date('Y-m-d', strtotime('+15 days', $date));
        // $tickets = Ticket::with('order')->whereBetween('date', [$startingdate, $dateafter15days])->get();
        $tickets = Ticket::whereHas('order', function ($query) use ($startingdate, $dateafter15days) {

            $query->whereBetween('date', [$startingdate, $dateafter15days]);
        })->get();
        $pdf = PDF::loadView('ticketsreport', compact('tickets', 'startingdate', 'dateafter15days'))->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
        // return view('ticketsreport', compact('tickets'));
    }
}
