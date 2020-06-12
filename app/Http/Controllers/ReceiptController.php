<?php

namespace App\Http\Controllers;

use App\Order;
use App\Receipt;
use App\Ticket;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
{


    public function __construct()
{
 
  $this->middleware('role:superadmin,admin,helpdesk');
//   $this->middleware('role:helpdesk', ['except' => ['refundTickets']]);
}

    public function store(Order $order, $total)
    {
        if ($order->status == 1)
            return redirect()->route('order.show', $order)->with('error', 'Order is already paid!');
        $payments = session()->get('payment');
        if ($payments == null)
            return redirect()->route('order.show', $order)->with('status', 'Select tickets to pay');
        $receipt = new Receipt();
        $receipt->employee_id = auth()->user()->id;
        $receipt->receiptable_id = $order->customer->id;
        $receipt->receiptable_type = "App\Customer";
        $receipt->type = "revenue";
        $receipt->description = "tickets payment";
        $receipt->total_amount = $total;
        $receipt->receipt_date = date('Y-m-d');
        $receipt->safe_id = '0';
        $receipt->save();
        $order->customer->totalcredit += $total;
        $order->customer->save();
        $paymentss=[];
        foreach ($payments as $ticket) {
            $id = $ticket['id'];
            $amount = $ticket['amount'];
            $tick=Ticket::where("id", "$id")->first();
            $paymentss["$id"]=["id" => $id, "amount" => $amount,"number"=>$tick->ticketNumber];
            $receipt->tickets()->attach("$id", ['amount' => $amount]);
        }
        $payments=$paymentss;
        $name = $order->customer->name;
        $result = $order->ticketsAmount();
        if ($result[1] - $result[2] == 0) {
            $order->status = '1';
            $order->save();
        }
        $pdf = PDF::loadView('wasl', compact('payments', 'receipt', 'name'));
        session()->forget('payment');
        app('App\Http\Controllers\MailController')->mailadmin('Part Order Payment', 'Order'. $order->id .' has been paid by customer ' . $order->customer->name . ' with total amount of '. $total . 'EGP on ' . date('Y-m-d').' to employee '.auth()->user()->name.'.');
        return $pdf->stream('invoice.pdf');
    }

    public function storeAllorder(Order $order, $total)
    {
        if ($order->status == 1) {
            return redirect()->route('order.show', $order)->with('error', 'Order is already paid!');
        }
        $receipt = new Receipt();
        $receipt->employee_id = auth()->user()->id;
        $receipt->receiptable_id = $order->customer->id;
        $receipt->receiptable_type = "App\Customer";
        $receipt->type = "revenue";
        $receipt->description = "All order tickets payment";
        $receipt->total_amount = $total;
        $receipt->receipt_date = date('Y-m-d');
        $receipt->safe_id = '0';
        $receipt->save();
        $orderPaymentInfo = $order->ticketsAmount()[0];
        $payments = [];
        foreach ($orderPaymentInfo as $ticket) {
            $id = $ticket[0]->id;
            $number = $ticket[0]->ticketNumber;
            if ($ticket[1] !== 'refunded') {
                $amount = $ticket[0]->sellprice - $ticket[1];
                $receipt->tickets()->attach("$id", ['amount' => $amount]);
                $payments["$id"] = ["id" => $ticket[0]->id, "amount" => $amount,"number"=>$number];
            }
        }

        if ($order->customer->id != 0) {
            $order->customer->totalcredit += $total;
            $order->customer->save();
        }
        $name = $order->customer->name;
        $order->status = '1';
        $order->save();
       app('App\Http\Controllers\MailController')->mailadmin('All Order Payment', 'Order '. $order->id .' has been paid by customer ' . $order->customer->name .' with total amount of '. $total . 'EGP on ' . date('Y-m-d').' to employee '.auth()->user()->name.' .');
        $pdf = PDF::loadView('wasl', compact('payments', 'receipt', 'name'));
        return $pdf->download('invoice.pdf');
    }


    public function refundTickets(Request $request)
    {
        $request->validate(['check' => 'required']);
        $tickets = Ticket::whereIn("id", $request->check)->with('receipts')->get();
        $order = $tickets[0]->order;
        $customer = $order->customer;
        $name = $customer->name;
        $receipt = new Receipt();
        $receipt->employee_id = auth()->user()->id;
        $receipt->receiptable_id = $customer->id;
        $receipt->receiptable_type = "App\Customer";
        $receipt->type = "expense";
        $receipt->description = "Tickets Refund";
        $receipt->receipt_date = date('Y-m-d');
        $receipt->safe_id = '0';
        $receipt->total_amount = 0;
        $receipt->save();
        $total = 0;

        foreach ($tickets as $ticket) {
            $result = $ticket->calculate();

            if ($result['payed'] != 0) {
                $receipt->tickets()->attach("$ticket->id", ['amount' => $result['payed']]);
                $total += $result['payed'];
            }
            $ticket->type = "refunded";
            $ticket->save();
            $customer->totalcredit += $ticket->sellprice - $result['payed'];
            $customer->save();
        }
        $receipt->total_amount = $total;
        if ($receipt->total_amount == 0) {
            $receipt->delete();
        } else {
            $receipt->save();
            $request->session()->flash('receipt', "$receipt->id");
        }


        $orderPayment = $order->ticketsAmount();
        if ($orderPayment[1] - $orderPayment[2] == 0) {
            $order->status = 1;
            $order->save();
        }

        //    $pdf = PDF::loadView('aznSarf',compact('tickets','receipt','name'));
        //    $path = public_path('Invoices');
        //    $fileName =  $receipt->id . '.' . 'pdf' ;
        //    $pdf->save($path . '/' . $fileName);

        return redirect()->route('order.show', $order);
    }

    public function print($receipt)
    {
         $receipt = Receipt::where("id", "$receipt")->with('tickets')->with('receiptable')->first();
         $pdf = PDF::loadView('eznsarf', compact("receipt"));
         return $pdf->download('invoice.pdf');
    }
}
