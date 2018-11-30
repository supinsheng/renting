<?php

namespace App\Exports;

use App\Model\House;
use Maatwebsite\Excel\Concerns\FromCollection;

class HouseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return House::all();
        // return House::
    }
}
