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
            ->where('adoption.stage', '=', 9)
            ->select(
                \DB::raw("CONCAT(users.firstname, ' ', users.name) as user_name"),
                'users.email',
                'users.gender',
                'users.civil_status',
                \DB::raw("CONCAT(users.region, ' ', users.province , ' ', users.city , ' ', users.barangay , ' ', users.street) as user_address"),
                'users.phone_number',
                'pets.pet_name',
                'pets.pet_type',
                'pets.breed',
                'pets.age',
                'pets.gender as pet_gender',
                'pets.size',
                'application.created_at',
                \DB::raw("
                    CASE 
                        WHEN adoption.stage = 9 THEN 'Accepted'
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
        return ['Name', 'Email', 'Gender', 'Civil Status', 'Address', 'Phone Number', 'Pet Name', 'Pet Type', 'Breed', 'Age', 'Pet Gender', 'size', 'Date of Application', 'Progress'];
    }
}
