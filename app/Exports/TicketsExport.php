<?php

namespace App\Exports;

use App\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TicketsExport implements FromCollection, WithHeadings, WithMapping
{

    private $date;

    function __construct($date)
    {
        $this->date = $date;
    }

    public function map($ticket): array
    {
        return [
            $ticket->id,
            $ticket->type,
            $ticket->passengerName,
            $ticket->destination,
            $ticket->transportationCompany,
            $ticket->rsoom,
            $ticket->percentageAsasy,
            $ticket->asasy,
            $ticket->total,
            $ticket->comission,
            $ticket->comissionTax,
            $ticket->bsp,
            $ticket->sellprice,
            $ticket->profit,
            $ticket->safy,
            $ticket->paymentType,
            $ticket->order_id,
        ];
    }

    public function headings(): array
    {
        return [
            'Ticket #',
            'Type',
            'Passenger Name',
            'Destination',
            'Tran Company',
            'Rsoom',
            '% assay',
            'Asasy',
            'Total',
            'Comission',
            'Comission tax',
            'BSP',
            'Sell Price',
            'Profit',
            'Safy',
            'Payment Type',
            'Order #',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $startingdate = $this->date;
        $date = strtotime($this->date);
        $dateafter15days = date('Y-m-d', strtotime('+15 days', $date));
        // $tickets = Ticket::with('order')->whereBetween('date', [$startingdate, $dateafter15days])->get();
        $tickets = Ticket::whereHas('order', function ($query) use ($startingdate, $dateafter15days) {

            $query->whereBetween('date', [$startingdate, $dateafter15days]);
        })->get();
        return $tickets;
    }
}
