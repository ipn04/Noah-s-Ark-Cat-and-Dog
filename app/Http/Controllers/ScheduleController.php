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
            return $visit->schedule && $visit->schedule->schedule_status === 'Accepted';
        });
    
        $acceptedPickups = $allPickups->filter(function ($pickup) {
            return $pickup->schedule && $pickup->schedule->schedule_status === 'Accepted';
        });
        
    
        $acceptedInterviews = $allInterviews->filter(function ($interview) {
            return $interview->schedule && $interview->schedule->schedule_status === 'Accepted';
        });

        return view('admin_contents.schedule', compact('visits', 'pickups', 'interviews', 'acceptedVisits', 'acceptedPickups', 'acceptedInterviews', 'interviewss'));
    }
    public function updateScheduleStatus(Request $request, $id)
    {
        // dd($id, $request->all());
        $scheduleVisit = ScheduleVisit::where('visit_id', $id)->first();
        // dd($scheduleVisit);
        if ($scheduleVisit) {
            // Update the schedule_status column
            $scheduleVisit->schedule->update(['schedule_status' => 'Accepted']);

            // Redirect or return a response as needed
            return redirect()->back()->with(['success', 'Schedule status updated successfully', 'update_status' => true]);
        }

        // If no ScheduleVisit record is found for the user, handle accordingly
        return redirect()->back()->with(['error', 'ScheduleVisit record not found for the user', 'update_status' => true]);
    }
}