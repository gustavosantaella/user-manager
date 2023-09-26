<?php

namespace App\Imports;

use App\Models\People;
use Carbon\Carbon;
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

        // Llama a la función auxiliar para convertir fecha de Excel a Carbon
        $dateOfBirth = $this->convertExcelDateToCarbon($cleanedRow['fecha_de_nacimiento'] ?? null);

        return new People([
            'name' => $cleanedRow['nombre'] ?? null,
            'lastname' => $cleanedRow['apellido'] ?? null,
            'email' => $cleanedRow['correo'] ?? null,
            'province' => $cleanedRow['provincia'] ?? null,
            'zip_code' => $cleanedRow['codigo_postal'] ?? null,
            'direction' => $cleanedRow['direccion'] ?? null,
            'sex' => $cleanedRow['sexo'] ?? null,
            'age' => $cleanedRow['edad'] ?? null,
            'dni' => $cleanedRow['dni'] ?? null,
            'date_birth' => $dateOfBirth, // Usar el valor convertido a Carbon
        ]);
    }

    // Función auxiliar para convertir fecha de Excel a Carbon
    private function convertExcelDateToCarbon($excelDate)
    {
        if ($excelDate === null) {
            return null;
        }

        // El número de serie de Excel para la fecha base (1 de enero de 1900)
        $excelBaseDate = 25569;

        // Convierte el valor de Excel a una fecha Carbon
        return Carbon::createFromTimestamp(($excelDate - $excelBaseDate) * 86400);
    }
}
