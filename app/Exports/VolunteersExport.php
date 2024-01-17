<?php

namespace App\Exports;

use App\Models\VolunteerAnswers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VolunteersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VolunteerAnswers::with(['volunteer_application.application.user'])
            ->whereHas('volunteer_application', function ($query) {
                $query->where('stage', 5);
            })
            ->get()
            ->map(function ($volunteerAnswer) {
                return [
                    'Applicant Name' => $volunteerAnswer->volunteer_application->application->user->firstname . ' ' .  $volunteerAnswer->volunteer_application->application->user->name,
                    'Email' => $volunteerAnswer->volunteer_application->application->user->email,
                    'Gender' => $volunteerAnswer->volunteer_application->application->user->gender,
                    'Birthday' => $volunteerAnswer->volunteer_application->application->user->birthday,
                    'Civil Status' => $volunteerAnswer->volunteer_application->application->user->civil_status,
                    'Address' => $volunteerAnswer->volunteer_application->application->user->region . ' ' . $volunteerAnswer->volunteer_application->application->user->province . ' ' . $volunteerAnswer->volunteer_application->application->user->city . ' ' . $volunteerAnswer->volunteer_application->application->user->barangay . ' ' . $volunteerAnswer->volunteer_application->application->user->street,
                    'Phone Number' => $volunteerAnswer->volunteer_application->application->user->phone_number,
                    'Date of Application' => $volunteerAnswer->volunteer_application->application->created_at,
                    'Progress' => ($volunteerAnswer->volunteer_application->stage == 5) ? 'Accepted' : 'Unknown',       
                ];
            });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Applicant Name',
            'Email', 
            'Gender',
            'Birthday',
            'Civil Status',
            'Address',
            'Phone Number',
            'Date of Application',
            'Progress',
        ];
    }
}
