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
        // Use a where condition to filter only adopted pets
        $data = Pet::where('adoption_status', 'Adopted')->get();

        return $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Customize the column headings as needed
        return [
            'ID',
            'Pet Name',
            'Pet Type',
            'Breed',
            'Age',
            'Color',
            'Adoption Status',
            'Gender',
            'Vaccination Status',
            'Weight',
            'Size',
            'Behaviour',
            'Description',
            'Dropzone File',
            'Created At',
            'Updated At',
        ];
    }
}
