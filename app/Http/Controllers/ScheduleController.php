<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleInterview;
use App\Models\SchedulePickup;
use App\Models\ScheduleVisit;
use App\Models\Notifications;
use App\Models\AdoptionAnswer;
use App\Models\Adoption;
use App\Models\Schedule;
use App\Models\VolunteerApplication;
use App\Models\Application;

use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller{
// {
//     public function view_schedule()
//     {
//         $visits = ScheduleVisit::with('user')->get();
//         $pickups = SchedulePickup::with('schedule')->get();
//         $interviews = ScheduleInterview::with('schedule')->get();
        
//         $interviewss = DB::table('schedule_interviews')
//         ->join('adoption', 'schedule_interviews.application_id', '=', 'adoption.application_id')
//         ->join('adoption_answers', 'adoption.id', '=', 'adoption_answers.adoption_id')
//         ->select('adoption_answers.*')
//         ->get();
        
//         $allVisits = ScheduleVisit::with('user')->get();
//         $allPickups = SchedulePickup::with('schedule')->get();
//         $allInterviews = ScheduleInterview::with('schedule')->get();

//         $acceptedVisits = $allVisits->filter(function ($visit) {
//             return $visit->schedule && $visit->schedule->schedule_status === 'Accepted';
//         });
    
//         $acceptedPickups = $allPickups->filter(function ($pickup) {
//             return $pickup->schedule && $pickup->schedule->schedule_status === 'Accepted';
//         });
        
    
//         $acceptedInterviews = $allInterviews->filter(function ($interview) {
//             return $interview->schedule && $interview->schedule->schedule_status === 'Accepted';
//         });

//         return view('admin_contents.schedule', compact('visits', 'pickups', 'interviews', 'acceptedVisits', 'acceptedPickups', 'acceptedInterviews', 'interviewss'));
//     }

    public function view_schedule(){
        $schedules = DB::table('schedules')
        ->leftJoin('schedule_interviews', 'schedules.id', '=', 'schedule_interviews.schedule_id')
        ->leftJoin('schedule_pickup', 'schedules.id', '=', 'schedule_pickup.schedule_id')
        ->leftJoin('schedule_visit', 'schedules.id', '=', 'schedule_visit.schedule_id')
        ->leftJoin('users as visit_users', 'schedule_visit.user_id', '=', 'visit_users.id')
        ->leftJoin('application as applications', function ($join) {
            $join->on('schedule_pickup.application_id', '=', 'applications.id')
                ->orOn('schedule_interviews.application_id', '=', 'applications.id');
                
        })
        ->leftJoin('adoption as adopt', 'applications.id', '=', 'adopt.application_id')
        ->leftJoin('volunteer_application as volunteer', 'applications.id', '=', 'volunteer.application_id')

        ->leftJoin('users as application_users', function ($join) {
            $join->on('applications.user_id', '=', 'application_users.id')
                ->orOn('applications.user_id', '=', 'application_users.id')
                ->orOn('visit_users.id', '=', 'application_users.id');
        })
        ->select(
            'schedules.schedule_status as schedule_status',
            'schedules.schedule_type as schedule_type',
            'schedule_interviews.application_id as interview_application_id',
            'schedule_pickup.application_id as pickup_application_id',
            'application_users.firstname as firstname',
            'application_users.name as lastname',
            'application_users.profile_image as image',
            'schedule_interviews.date as schedule_date',
            'schedule_interviews.time as schedule_time',
            'schedule_pickup.date as pickup_date',
            'schedule_pickup.time as pickup_time',
            'schedule_visit.date as visit_date',
            'schedule_visit.time as visit_time',
            'applications.application_type as interview_type',
            'applications.application_type as pickup_type',
            'applications.id as interview_id',
            'schedule_visit.visit_id as visit_id',
            'adopt.id as adoption_id',
            'volunteer.id as volunteer_id',
            'application_users.id as user_id',

        )
        ->get();
        $allSchedules = Schedule::where('schedule_status', 'Accepted')->count();
        $scheduleInterview = $schedules->where('schedule_type', 'Interview')->where('schedule_status', 'Accepted')->count();
        $scheduleVisit = $schedules->where('schedule_type', 'Visit')->where('schedule_status', 'Accepted')->count();
        $scheduleInPickup = $schedules->where('schedule_type', 'Pickup')->where('schedule_status', 'Accepted')->count();
        
        $allSchedulesPending = Schedule::where('schedule_status', 'Pending')->count();
        $pendingInterview = $schedules->where('schedule_type', 'Interview')->where('schedule_status', 'Pending')->count();
        $pendingVisit = $schedules->where('schedule_type', 'Visit')->where('schedule_status', 'Pending')->count();
        $pendingInPickup = $schedules->where('schedule_type', 'Pickup')->where('schedule_status', 'Pending')->count();

        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();


    return view('admin_contents.schedule', ['unreadNotificationsCount' => $unreadNotificationsCount, 'adminNotifications' => $adminNotifications, 'schedules' => $schedules, 'allSchedules' =>$allSchedules, 'scheduleInterview' => $scheduleInterview, 'scheduleVisit' => $scheduleVisit, 'scheduleInPickup' =>$scheduleInPickup, 'allSchedulesPending' => $allSchedulesPending, 'pendingInterview' => $pendingInterview, 'pendingVisit' => $pendingVisit, 'pendingInPickup' => $pendingInPickup]);

    }
   

    public function updateScheduleStatus(Request $request, $id)
    {
        // dd($id, $request->all());
        $scheduleVisit = ScheduleVisit::where('visit_id', $id)->first();
        // dd($scheduleVisit);
        if ($scheduleVisit) {
            // Update the schedule_status column
            $scheduleVisit->schedule->update(['schedule_status' => 'Accepted']);

            return redirect()->back()->with(['success', 'Schedule status updated successfully', 'update_status' => true]);
        }

        // If no ScheduleVisit record is found for the user, handle accordingly
        return redirect()->back()->with(['error', 'ScheduleVisit record not found for the user', 'update_status' => true]);
    }
    public function rejectScheduleStatusVisit(Request $request, $id)
    {
        // dd($id, $request->all());
        $scheduleVisit = ScheduleVisit::where('visit_id', $id)->first();
        // dd($scheduleVisit);
        if ($scheduleVisit) {
            // Update the schedule_status column
            $scheduleVisit->schedule->update(['schedule_status' => 'Rejected']);

            return redirect()->back()->with(['success', 'Schedule status updated successfully', 'update_status' => true]);
        }

        // If no ScheduleVisit record is found for the user, handle accordingly
        return redirect()->back()->with(['error', 'ScheduleVisit record not found for the user', 'update_status' => true]);
    }
    public function updateScheduleForVolunteer(Request $request, $userId, $applicationId)
    {   
        $adminId = auth()->id();

        $notificationMessage = 'Admin has accepted your schedule interview';

        // dd($applicationId);
        $notification = new Notifications();
        $notification->application_id = $applicationId; 
        $notification->sender_id = $adminId;
        $notification->receiver_id = $userId; 
        $notification->concern = 'Volunteer Application';
        $notification->message = $notificationMessage;
        $notification->save();

        $scheduleInterview = ScheduleInterview::whereHas('application', function ($query) use ($applicationId) {
            $query->where('application_id', $applicationId);
        })->latest()->first();
        // dd($scheduleInterview);
        if ($scheduleInterview) {
            // Update the status column in the related Schedule model
            $scheduleInterview->schedule->update(['schedule_status' => 'Accepted']);
            
            $volunteerApplication = VolunteerApplication::where('application_id', $applicationId)->first();
            if ($volunteerApplication) {
                // Update the stage column in the related VolunteerApplication model
                $newStage = $volunteerApplication->stage + 1;
                $volunteerApplication->update(['stage' => $newStage]);
    
                return redirect()->back()->with(['success', 'Updates applied successfully', 'volunteer_progress' => true]);
            }
        }
    
        return redirect()->back()->with(['error', 'ScheduleInterview record not found', 'volunteer_progress' => true]);
    }
    public function addStage(Request $request, $id)
    {   
        $volunteerApplication = VolunteerApplication::where('application_id', $id)->first();
        
        if ($volunteerApplication) {
            // Update the stage column in the related VolunteerApplication model
            $newStage = $volunteerApplication->stage + 1;
            $volunteerApplication->update(['stage' => $newStage]);

            return redirect()->back()->with(['success', 'Updates applied successfully', 'volunteer_progress' => true]);
        }

        return redirect()->back()->with(['error', 'ScheduleInterview record not found', 'volunteer_progress' => true]);
    }
}
