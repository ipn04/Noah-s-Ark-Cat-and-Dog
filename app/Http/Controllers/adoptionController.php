<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;

class adoptionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'social_media' => 'required',
            'occupation' => 'required',
            'alternate_contact' => 'required',
            'relation' => 'required',
            'relationship' => 'required', // Validate your input fields accordingly
            'other' => 'nullable|required_if:relationship,Other' // Validation rules for 'other' when 'Other' is selected
        ]);
    
        $adoption = new Adoption();
    
        // Assign values from validated data to the Adoption instance
        $adoption->social_media = $validatedData['social_media'];
        $adoption->occupation = $validatedData['occupation'];
        $adoption->alternate_contact = $validatedData['alternate_contact'];
        $adoption->relation = $validatedData['relation'];
    
        // Check if 'Other' is selected
        if ($validatedData['relationship'] === 'Other') {
            // Save the concatenated value of 'relationship' and 'other' input
            $adoption->relationship = $validatedData['relationship'] . ': ' . $validatedData['other'];
        } else {
            // Save the selected relationship option directly
            $adoption->relationship = $validatedData['relationship'];
        }
    
        // Save the adoption instance
        $adoption->save();
    
        return redirect()->back()->with('success', 'Adoption details saved successfully');
    }
    
}
