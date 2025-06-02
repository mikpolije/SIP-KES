<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PoliUmum;

class PoliUmumExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PoliUmum::select('diagnosa')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('diagnosa')
            ->orderByDesc('total')
            ->take(10)
            ->get();
    }

    public function headings(): array
    {
        return [
            'Diagnosa',
            'Jumlah Kasus'
        ];
    }
}
