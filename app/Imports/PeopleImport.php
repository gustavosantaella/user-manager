<?php

namespace App\Imports;

use App\Models\People;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PeopleImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new People([
            'name' => $row['nombre'],
            'lastname' => $row['apellido'],
            'email' => $row['correo'],
            'province' => $row['provincia'],
            'zip_code' => $row['codigo postal'],
            'direction' => $row['direccion'],
            'sex' => $row['sexo'],
            'age' => $row['edad'],
            'dni' => $row['dni'],
            'date_birth' => $row['fecha de nacimiento'],

        ]);
    }
}
