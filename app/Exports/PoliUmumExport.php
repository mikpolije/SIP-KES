<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PoliUmumExport implements FromArray, WithHeadings, WithTitle
{
    protected $data;
    protected $title;

    public function __construct(array $data, string $title)
    {
        $this->data = $data;
        $this->title = $title;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'NO',
            'KODE ICD-X',
            'NAMA PENYAKIT',
            'JUMLAH',
            'PERSENTASE'
        ];
    }

    public function title(): string
    {
        return $this->title;
    }
}
