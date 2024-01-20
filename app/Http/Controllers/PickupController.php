<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\SchedulePickup;
use App\Models\Application;
use App\Models\Adoption;

class PickupController extends Controller
{
    public function store(Request $request)
    {
    $currentUserId = auth()->user()->id; // Change this to your actual way of getting the user ID

        $application = Application::where('user_id', $currentUserId)
        ->where('application_type', 'application_form') 
        ->latest('created_at') // Order by created_at in descending order
        ->first();

        // Create a new schedule
        $schedule = new Schedule();
        $schedule->schedule_type = 'Pickup'; // Default value
        $schedule->schedule_status = 'Pending'; // Default value
        $schedule->save();
 
        $schedID = $schedule->id;
        
        $schedulePickup = new SchedulePickup();
        $schedulePickup->schedule_id = $schedID;
        $schedulePickup->application_id = $application->id;
        $schedulePickup->date = $request->input('date');
        $schedulePickup->time = $request->input('time');
        $schedulePickup->save();

        $adoption = Adoption::whereHas('application', function ($query) use ($currentUserId) {
            $query->where('user_id', $currentUserId);
        })->latest('created_at')->first();

        if ($adoption) {
            $adoption->stage += 1; // Increment 'stage' field
            $adoption->save();
        }

        return redirect()->back()->with(['send_schedule' => true]); 
    }
}
