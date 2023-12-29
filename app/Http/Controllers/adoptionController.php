<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Models\Application;
use App\Models\Pet;

class adoptionController extends Controller
{
    public function store(Request $request, $petId)
    {
        $userId = auth()->user()->id; // Get the authenticated user's ID
        $pet = Pet::find($petId);

        // Create application entry (if applicable)
        $application = new Application();
        $application->user_id = $userId; // Use the authenticated user's ID
        $application->save();

        $applicationId = $application->id;

        // Create adoption entry
        $adoption = new Adoption();
        $adoption->pet_id = $pet->id; // Use the existing pet ID
        $adoption->application_id = $applicationId; // Set this to the application ID if applicable
        $adoption->save();

        $validatedData = $request->validate([
            'adoption_id' => 'required', 
            'first_question' => 'required|string|max:255',
            'second_question' => 'required|string|max:255',
            'third_question' => 'required|string|max:255',
            'fourth_question' => 'required|string|max:255',
            'fifth_question' => 'required|string|max:255',
            'sixth_question' => 'required|string|max:255',
            'seventh_question' => 'required|string|max:255',
            'eighth_question' => 'required|string|max:255',
            'ninth_question' => 'required|string|max:255',
            'tenth_question' => 'required|string|max:255',
            'eleventh_question' => 'required|string|max:255',
            'twelfth_question' => 'required|string|max:255',
            'thirteenth_question' => 'required|string|max:255',
            'fourteenth_question' => 'required|string|max:255',
            'fifteenth_question' => 'required|string|max:255',
            'sixteenth_question' => 'required|string|max:255',
            'seventeenth_question' => 'required|string|max:255',
            'eighteenth_question' => 'required|string|max:255',
            'nineteenth_question' => 'required|string|max:255',
            'twentieth_question' => 'required|string|max:255',
            'twentyfirst_question' => 'required|string|max:255',
            'twentysecond_question' => 'required|string|max:255',
            'twentythird_question' => 'required|string|max:255',
            'upload' => 'required|string|max:255',
            'upload2' => 'required|string|max:255',
        ]);
    
        
        // Save the adoption instance
        $adoption->save();
    
        return redirect()->back()->with('success', 'Adoption details saved successfully');
    }
    
}
