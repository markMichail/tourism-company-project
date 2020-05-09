<?php

namespace App\Exports;

use App\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TicketsExport implements FromCollection, WithHeadings, WithMapping
{

    private $startdate;
    private $enddate;

    function __construct($startdate, $enddate)
    {
        $this->startdate = $startdate;
        $this->enddate = $enddate;
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
        $startingdate = $this->startdate;
        $endingdate = $this->enddate;
        // $tickets = Ticket::with('order')->whereBetween('date', [$startingdate, $dateafter15days])->get();
        $tickets = Ticket::whereHas('order', function ($query) use ($startingdate, $endingdate) {
            $query->whereBetween('date', [$startingdate, $endingdate]);
        })->get();
        return $tickets;
    }
}
