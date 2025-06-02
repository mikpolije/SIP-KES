<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PoliUmumExport implements FromCollection, WithHeadings, WithTitle
{
    protected $data;
    protected $bulan;
    protected $caraBayar;

    public function __construct($data, $bulan, $caraBayar)
    {
        $this->data = $data;
        $this->bulan = $bulan;
        $this->caraBayar = $caraBayar;
    }

    public function collection()
    {
        return collect($this->data)->map(function ($item, $index) {
            return [
                'NO' => $index + 1,
                'KODE ICD-X' => $item[0],
                'NAMA PENYAKIT' => $item[1],
                'JUMLAH' => $item[2],
                'PERSENTASE' => $item[3]
            ];
        });
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
        return "10 Besar Penyakit {$this->bulan} {$this->caraBayar}";
    }
}
