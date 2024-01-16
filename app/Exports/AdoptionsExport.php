<?php

namespace App\Exports;

use App\Models\Adoption;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdoptionsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Adoption::join('pets', 'adoption.pet_id', '=', 'pets.id')
            ->join('application', 'adoption.application_id', '=', 'application.id')
            ->join('users', 'application.user_id', '=', 'users.id')
            ->select(
                \DB::raw("CONCAT(users.firstname, ' ', users.name) as user_name"), 
                'pets.pet_name',
                'application.created_at',
                \DB::raw("
                    CASE 
                        WHEN adoption.stage = 9 THEN 'Accepted'
                        WHEN adoption.stage >= 0 AND adoption.stage <= 8 THEN 'Pending'
                        WHEN adoption.stage = 10 THEN 'Rejected'
                        ELSE CAST(adoption.stage AS CHAR)
                    END as status
                ")          
            ) 
            ->get();
            
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return ['User Name', 'Pet Name', 'Date of Application', 'Progress'];
    }
}
