<?php

namespace App\Http\Controllers;

use App\Receipt;
use App\Ticket;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {
        $tickets = Ticket::with('order')->get();
        return view('ticketsreport', compact('tickets'));
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
        $pdf = PDF::loadView('print.ticketsreport', compact('tickets', 'startingdate', 'dateafter15days'))->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

    public function receipts()
    {
        $receipts = Receipt::with('receiptable')->get();
        return view('receiptsreport', compact('receipts'));
    }

    public function printReceipts($date)
    {
        $startingdate = $date;
        $date = strtotime($date);
        $dateafter15days = date('Y-m-d', strtotime('+15 days', $date));
        $receipts = Receipt::whereBetween('receipt_date', [$startingdate, $dateafter15days])->with('receiptable')->get();
        $pdf = PDF::loadView('print.receiptsreport', compact('receipts', 'startingdate', 'dateafter15days'));
        return $pdf->stream('report.pdf');
        // return view('ticketsreport', compact('tickets'));
    }
}
