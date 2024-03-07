<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use App\Models\Pet;
use App\Models\ScheduleInterview;
use App\Models\SchedulePickup;
use App\Models\ScheduleVisit;
use App\Models\AdoptionAnswer;
use App\Models\Adoption;
use App\Models\Notifications;
use App\Models\VolunteerApplication;

use Illuminate\Support\Facades\DB;


class ApplicationController extends Controller
{
    public function recentapplication()
    {
         $applications = Application::join('users', 'application.user_id', '=', 'users.id')
                ->select(
                    'application.id as id',
                    'application.updated_at as update',
                    'application.application_type as type',
                    'users.name as lastname',
                    'users.firstname as firstname',
                    'users.email as user_email',
                    'users.id as user_id',
                )
                ->orderByDesc('application.updated_at')
                ->limit(7)
                ->get();
        
            $availpet = Pet::where('adoption_status', 'available')->count();
            $registered = User::where('role', 'user')->count();
            $totalApplication = Application::count();
            $todayDate = Carbon::now()->toDateString();
            $formattedDate = Carbon::parse($todayDate)->format('F j, Y');
        
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
                        ->orOn('visit_users.id', '=', 'application_users.id');
                })
                ->where(function ($query) use ($todayDate) {
                    $query->whereDate('schedule_interviews.date', '=', $todayDate)
                        ->orWhereDate('schedule_pickup.date', '=', $todayDate)
                        ->orWhereDate('schedule_visit.date', '=', $todayDate);
                })
                ->where('schedules.schedule_status', '=', 'Accepted') 
                ->limit(4)
                ->orderBy('schedule_interviews.time', 'asc')
                ->orderBy('schedule_pickup.time', 'asc')
                ->orderBy('schedule_visit.time', 'asc')
                ->select(
                    'schedule_interviews.time as interview_time',
                    'schedules.schedule_type as type',
                    'schedule_pickup.time as pickup_time',
                    'schedule_visit.time as visit_time',
                    'applications.id as application_id',
                    'applications.user_id as user_id',
                    'applications.application_type as application_type',
                    'application_users.name as lastname',
                    'application_users.firstname as firstname',
                    'schedule_visit.visit_id as visit_id',
                    'adopt.id as adoption_id',
                    'volunteer.id as volunteer_id',
                    'schedule_visit.concern as concern'

                    
                )
                ->get();
    

            $currentDate = now();
            $currentMonthStart = $currentDate->startOfMonth();

            $chartData = [];

            for ($i = 0; $i < 3; $i++) {
                $startOfMonth = $currentMonthStart->copy()->subMonths($i);

                $endOfMonth = $startOfMonth->copy()->endOfMonth();

                $adoptedPetsCount = Pet::where('adoption_status', 'Adopted')
                    ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
                    ->count();

                $chartData[$startOfMonth->format('F')] = $adoptedPetsCount;
            }

    
            

            $adminId = auth()->user()->id;
                $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
                    ->whereNull('read_at')
                    ->count();

            $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();
            
        return view('dashboards.admin_dashboard', ['schedules' => $schedules])
            ->with(compact('chartData','applications', 'availpet', 'registered', 'totalApplication', 'formattedDate', 'unreadNotificationsCount', 'adminNotifications'));
        
    }
}
