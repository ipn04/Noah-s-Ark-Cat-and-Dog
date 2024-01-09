<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleInterview;
use App\Models\SchedulePickup;
use App\Models\ScheduleVisit;
use App\Models\AdoptionAnswer;

class ScheduleController extends Controller
{
    public function view_schedule()
    {
        $visits = ScheduleVisit::with('user')->get();
        $pickups = SchedulePickup::with('schedule')->get();
        $interviews = ScheduleInterview::with('schedule')->get();

        return view('admin_contents.schedule', compact('visits', 'pickups', 'interviews'));
    }
}
