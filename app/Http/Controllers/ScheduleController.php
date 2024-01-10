<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleInterview;
use App\Models\SchedulePickup;
use App\Models\ScheduleVisit;
use App\Models\AdoptionAnswer;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function view_schedule()
    {
        $visits = ScheduleVisit::with('user')->get();
        $pickups = SchedulePickup::with('schedule')->get();
        $interviews = ScheduleInterview::with('schedule')->get();
        
        $interviewss = DB::table('schedule_interviews')
        ->join('adoption', 'schedule_interviews.application_id', '=', 'adoption.application_id')
        ->join('adoption_answers', 'adoption.id', '=', 'adoption_answers.adoption_id')
        ->select('adoption_answers.*')
        ->get();
        
        $allVisits = ScheduleVisit::with('user')->get();
        $allPickups = SchedulePickup::with('schedule')->get();
        $allInterviews = ScheduleInterview::with('schedule')->get();

        $acceptedVisits = $allVisits->filter(function ($visit) {
            return $visit->schedule->schedule_status === 'Accepted';
        });
    
        $acceptedPickups = $allPickups->filter(function ($pickup) {
            return $pickup->schedule->schedule_status === 'Accepted';
        });
    
        $acceptedInterviews = $allInterviews->filter(function ($interview) {
            return $interview->schedule->schedule_status === 'Accepted';
        });

        return view('admin_contents.schedule', compact('visits', 'pickups', 'interviews', 'acceptedVisits', 'acceptedPickups', 'acceptedInterviews', 'interviewss'));
    }
}
