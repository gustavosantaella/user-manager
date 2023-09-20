<?php

namespace App\Exports;

use App\Models\People;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PeopleExport implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize
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
        // Obtén los registros de People
        $people = People::all();

        // Formatea las fechas en la colección
        $formattedPeople = $people->map(function ($person) {
            return [
                'name' => $person->name,
                'lastname' => $person->lastname,
                'email' => $person->email,
                'province' => $person->province,
                'zip_code' => $person->zip_code,
                'direction' => $person->direction,
                'sex' => $person->sex,
                'age' => $person->age,
                'dni' => $person->dni,
                'date_birth' => $person->date_birth ? date('d-m-Y', strtotime($person->date_birth)) : null,

            ];
        });

        return $formattedPeople;
    }
}
