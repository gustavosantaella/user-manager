<?php

namespace App\Exports;

use App\Models\People;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeopleExport implements FromCollection
{
    use Exportable;
    public function collection()
    {
        return People::all();
    }
}
