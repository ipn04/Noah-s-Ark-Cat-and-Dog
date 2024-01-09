<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleInterview;
use App\Models\SchedulePickup;
use App\Models\ScheduleVisit;
use App\Models\AdoptionAnswer;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function view_schedule()
    {
        $visits = ScheduleVisit::with('user')->get();
        $pickups = SchedulePickup::with('schedule')->get();
        $interviews = ScheduleInterview::with('schedule')->get();

        $allVisits = ScheduleVisit::with('user')->get();
        $allPickups = SchedulePickup::with('schedule')->get();
        $allInterviews = ScheduleInterview::with('schedule')->get();
    
        // Filtered records with schedule_status as "Accepted"
        $acceptedVisits = $allVisits->filter(function ($visit) {
            return $visit->schedule->schedule_status === 'Accepted';
        });
    
        $acceptedPickups = $allPickups->filter(function ($pickup) {
            return $pickup->schedule->schedule_status === 'Accepted';
        });
    
        $acceptedInterviews = $allInterviews->filter(function ($interview) {
            return $interview->schedule->schedule_status === 'Accepted';
        });

        return view('admin_contents.schedule', compact('visits', 'pickups', 'interviews', 'acceptedVisits', 'acceptedPickups', 'acceptedInterviews'));
    }
}
