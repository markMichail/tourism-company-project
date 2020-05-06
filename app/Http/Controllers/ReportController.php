<?php

namespace App\Http\Controllers;

use App\Exports\ReceiptsExport;
use App\Exports\TicketsExport;
use App\Receipt;
use App\Setting;
use App\Ticket;
use PDF;
use Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin,admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {
        $tickets = Ticket::with('order')->get();
        $period = Setting::where('name', 'reportPeriod')->get()[0]->value;
        return view('ticketsreport', compact('tickets', 'period'));
    }

    public function printTickets($startingdate)
    {
        $endingdate = $this->getEndDate($startingdate);
        $tickets = Ticket::whereHas('order', function ($query) use ($startingdate, $endingdate) {
            $query->whereBetween('date', [$startingdate, $endingdate]);
        })->get();
        $pdf = PDF::loadView('print.ticketsreport', compact('tickets', 'startingdate', 'endingdate'))->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

    public function excelTickets($date)
    {
        return Excel::download(new TicketsExport($date), 'tickets' . $date . '.xlsx');
    }

    public function receipts()
    {
        $receipts = Receipt::with('receiptable')->get();
        $period = Setting::where('name', 'reportPeriod')->get()[0]->value;
        return view('receiptsreport', compact('receipts', 'period'));
    }

    public function printReceipts($startingdate)
    {

        $endingdate = $this->getEndDate($startingdate);

        $receipts = Receipt::whereBetween('receipt_date', [$startingdate, $endingdate])->with('receiptable')->get();
        $pdf = PDF::loadView('print.receiptsreport', compact('receipts', 'startingdate', 'endingdate'));
        return $pdf->stream('report.pdf');
    }

    public function excelReceipts($date)
    {
        return Excel::download(new ReceiptsExport($date), 'receipt' . $date . '.xlsx');
    }


    public function getEndDate($date)
    {
        $period = Setting::where('name', 'reportPeriod')->get()[0]->value;
        $startingdate = strtotime($date);
        $endingdate = date('Y-m-d', strtotime('+' . $period . ' days', $startingdate));
        return $endingdate;
    }
}
