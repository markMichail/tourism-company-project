<?php

namespace App\Exports;

use App\Receipt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReceiptsExport implements FromCollection, WithHeadings, WithMapping
{
    private $date;

    function __construct($date)
    {
        $this->date = $date;
    }

    public function map($receipt): array
    {
        return [
            $receipt->receiptable->name,
            $receipt->type,
            $receipt->description,
            $receipt->total_amount,
            $receipt->receipt_date,
        ];
    }

    public function headings(): array
    {
        return [
            'Destination / Customer',
            'Type',
            'Description',
            'Total amount',
            'Date',
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
        $receipts = Receipt::whereBetween('receipt_date', [$startingdate, $dateafter15days])->with('receiptable')->get();
        return $receipts;
    }
}
