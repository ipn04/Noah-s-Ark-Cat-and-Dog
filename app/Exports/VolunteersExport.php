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
        ->get()
        ->map(function ($volunteerAnswer) {
            return [
                'Applicant Name' => $volunteerAnswer->volunteer_application->application->user->firstname . ' ' .  $volunteerAnswer->volunteer_application->application->user->name,
                'Date of Application' => $volunteerAnswer->volunteer_application->application->created_at,
                'Progress' => ($volunteerAnswer->volunteer_application->stage >= 0 && $volunteerAnswer->volunteer_application->stage <= 4) ? 'Pending' : (
                    ($volunteerAnswer->volunteer_application->stage == 5) ? 'Accepted' : (
                        ($volunteerAnswer->volunteer_application->stage == 10) ? 'Rejected' : 'Unknown'
                    )
                ),            
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
            'Date of Application',
            'Progress',
        ];
    }
}
