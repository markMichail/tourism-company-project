<?php

namespace App\Exports;

use App\Receipt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReceiptsExport implements FromCollection, WithHeadings, WithMapping
{
    private $startdate;
    private $enddate;

    function __construct($startdate, $enddate)
    {
        $this->startdate = $startdate;
        $this->enddate = $enddate;
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
        $startingdate = $this->startdate;
        $endingdate = $this->enddate;
        $receipts = Receipt::whereBetween('receipt_date', [$startingdate, $endingdate])->with('receiptable')->get();
        return $receipts;
    }
}
