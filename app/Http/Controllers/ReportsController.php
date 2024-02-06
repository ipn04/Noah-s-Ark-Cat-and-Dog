<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Notifications;
use App\Models\User;
use App\Models\Pet;

class ReportsController extends Controller
{
    public function view_reports(){

        $applicationsTotalCount = Application::count();
        $totalUsers = User::count();
        $totalAdopted = Pet::where('adoption_status', 'Adopted')->count();
        
        $dogCount = Pet::where('pet_type', 'dog')->where('adoption_status', 'Adopted')->count();
        $catCount = Pet::where('pet_type', 'cat')->where('adoption_status', 'Adopted')->count();

         // Get unique breeds and their counts
         $breedsData = Pet::where('adoption_status', 'Adopted')
         ->select('breed', \DB::raw('count(*) as counts'))
         ->groupBy('breed')
         ->get();

        // Separate breeds and counts for chart
        $breeds = $breedsData->pluck('breed');
        $counts = $breedsData->pluck('counts');
        
        // Get unique age ranges and their counts
        $agesData = Pet::where('adoption_status', 'Adopted')
            ->select('age', \DB::raw('count(*) as count'))
            ->groupBy('age')
            ->get();

        // Separate age ranges and counts for chart
        $ageRanges = $agesData->pluck('age');
        $count = $agesData->pluck('count');

        $behaviorsData = Pet::where('adoption_status', 'Adopted')
    ->select(\DB::raw('behaviour'), \DB::raw('count(*) as counted'))
    ->groupBy(\DB::raw('behaviour'))
    ->get();


        // Separate behavior values and counts for chart
        $behaviors = $behaviorsData->pluck('behaviour');
        $countss = $behaviorsData->pluck('counted');


         // Get counts for each gender
         $genderData = Pet::where('adoption_status', 'Adopted')
         ->select('gender', \DB::raw('count(*) as count'))
         ->groupBy('gender')
         ->get();

     // Separate gender and counts for chart
     $genders = $genderData->pluck('gender');
     $gendercounts = $genderData->pluck('count');

     $sizeData = Pet::where('adoption_status', 'Adopted')
            ->select('size', \DB::raw('count(*) as count'))
            ->groupBy('size')
            ->get();

        // Separate size and counts for chart
        $sizes = $sizeData->pluck('size');
        $sizecounts = $sizeData->pluck('count');

        $currentYear = now()->year;

        // Get counts for each month
        $adoptedPetsByMonth = Pet::where('adoption_status', 'Adopted')
            ->whereYear('updated_at', $currentYear)
            ->selectRaw('MONTH(updated_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        // Initialize the data array for all months with 0 count
        $AdoptedData = array_fill_keys(range(1, 12), 0);

        // Fill in the actual counts where available
        foreach ($adoptedPetsByMonth as $data) {
            $AdoptedData[$data->month] = $data->count;
        }

        // Convert month numbers to month names
        $AdoptedData = array_map(function ($count, $month) {
            return [\Carbon\Carbon::createFromDate(null, $month, null)->monthName => $count];
        }, $AdoptedData, array_keys($AdoptedData));

        // Flatten the array
        $AdoptedData = array_merge(...$AdoptedData);

        $currentYear = now()->year;
        $previousYear = $currentYear - 1;

        // Get counts for the current year
        $currentYearCount = Pet::where('adoption_status', 'Adopted')
            ->whereYear('updated_at', $currentYear)
            ->count();

        // Get counts for the previous year
        $previousYearCount = Pet::where('adoption_status', 'Adopted')
            ->whereYear('updated_at', $previousYear)
            ->count();

        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();
    
        return view('admin_contents.reports', compact('currentYearCount','previousYearCount','AdoptedData','sizes','sizecounts', 'genders','gendercounts','behaviors','countss','ageRanges','count','breeds','counts','applicationsTotalCount','totalUsers','totalAdopted','dogCount','catCount', 'unreadNotificationsCount', 'adminNotifications'));
    }
}
