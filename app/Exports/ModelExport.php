<?php

namespace App\Exports;

use App\Models\People;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ModelExport implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function title(): string
    {
        return 'Lista de Personas'; // Título de la hoja de cálculo
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'Correo',
            'Provincia',
            'Código Postal',
            'Dirección',
            'Sexo',
            'Edad',
            'DNI',
            'Fecha de Nacimiento',
        ];
    }

    public function collection()
    {
        return collect([]);

    }
}
