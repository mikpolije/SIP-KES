<?php

namespace App\Livewire\Master;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Master\Doctor;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\IconColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class DoctorsTable extends DataTableComponent
{
    protected $model = Doctor::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setLoadingPlaceholderEnabled()
            ->setColumnSelectDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->hideIf(true),
            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Nama', 'nama')
                ->sortable()
                ->searchable(),
            Column::make('No Telepon', 'no_telepon'),
            Column::make('Alamat', 'alamat')
                ->sortable()
                ->searchable(),
            Column::make('NO SIP', 'no_sip')
                ->sortable()
                ->searchable(),
            Column::make('NIP', 'nip')
                ->sortable()
                ->searchable(),
            Column::make('Jadwal Layanan', 'jadwal_layanan')
                ->sortable()
                ->searchable(),
            ButtonGroupColumn::make('Aksi')
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('doctor.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-blue-500 hover:no-underline',
                            ];
                        }),
                ])
        ];
    }
}
