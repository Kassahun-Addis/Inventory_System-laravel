<?php

namespace App\Exports;

use App\Models\Bank; // Update the model name as necessary
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BankCategoryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Bank::all(); // Retrieve all bank records, adjust as necessary for your needs
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Created At',
            'Updated At',
        ];
    }
}