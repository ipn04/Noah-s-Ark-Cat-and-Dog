<?php

namespace App\Exports;

use App\Models\Pet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PetsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Pet::where('adoption_status', 'Adopted')
        ->select('pet_type', \DB::raw('COUNT(id) as total_adoptions'))
        ->groupBy('pet_type')
        ->get();

        return $data;
    }
}
