<?php

namespace App\Imports;

use App\Models\People;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PeopleImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $cleanedRow = [];
        foreach ($row as $key => $value) {
            $cleanedKey = preg_replace('/[^A-Za-z0-9_]/', '', $key);
            $cleanedRow[$cleanedKey] = $value;
        }

        return new People([
            'name' => $cleanedRow['nombre'] ?? null,
            'lastname' => $cleanedRow['apellido'] ?? null,
            'email' => $cleanedRow['correo'] ?? null,
            'province' => $cleanedRow['provincia'] ?? null,
            'zip_code' => $cleanedRow['codigopostal'] ?? null, // Asegúrate de que coincida con la versión limpiada
            'direction' => $cleanedRow['direccion'] ?? null,
            'sex' => $cleanedRow['sexo'] ?? null,
            'age' => $cleanedRow['edad'] ?? null,
            'dni' => $cleanedRow['dni'] ?? null,
            'date_birth' => $cleanedRow['fechadenacimiento'] ?? null, // Asegúrate de que coincida con la versión limpiada
        ]);
    }

}
