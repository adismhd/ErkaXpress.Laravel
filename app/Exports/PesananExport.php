<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Pesanan;

class PesananExport implements FromCollection
{
    public function collection()
    {
        $pesanan = Pesanan::all();
        return $pesanan;
    }
}
