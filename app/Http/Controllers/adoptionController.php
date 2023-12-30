<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Models\Application;
use App\Models\AdoptionAnswer;
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

        // // Create adoption entry
        $adoption = new Adoption();
        $adoption->pet_id = $petId; // Use the existing pet ID
        $adoption->application_id = $applicationId; // Set this to the application ID if applicable
        $adoption->save();

        $adoptionId = $adoption->id;
        // dd($request->all());
        
        $validatedData = $request->validate([
            'first_question' => 'required|string|max:255',
            'second_question' => 'required|string|max:255',
            'third_question' => 'required|string|max:255',
            'fourth_question' => 'required|string|max:255',
            'fifth_question' => 'required|string|max:255',
            'sixth_question' => 'required|string|max:255',
            'sevent_question' => 'required|string|max:255',
            'eight_question' => 'required|string|max:255',
            'ninth_question' => 'required|string|max:255',
            'tenth_question' => 'required|string|max:255',
            'eleventh_question' => 'required|string|max:255',
            'twelfth_question' => 'required|string|max:255',
            'thirteenth_question' => 'required|string|max:255',
            'fourteenth_question' => 'required|string|max:255',
            'fifteenth_question' => 'required|string|max:255',
            'seventeenth_question' => 'required|string|max:255',
            'eighteenth_question' => 'required|string|max:255',
            'nineteenth_question' => 'required|string|max:255',
            'twentieth_question' => 'required|string|max:255',
            'twentyfirst_question' => 'required|string|max:255',
            'twentysecond_question' => 'required|string|max:255',
            'twentythird_question' => 'required|string|max:255',
            'upload' => 'required',
            'upload2' => 'required',
        ],
        [
            'upload.required' => 'The pet image is required. Please, try again',
            'upload.image' => 'The file must be an image.',
            'upload.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'upload.max' => 'Maximum file size allowed is 2MB.',
            'upload2.required' => 'The pet image is required. Please, try again',
            'upload2.image' => 'The file must be an image.',
            'upload2.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'upload2.max' => 'Maximum file size allowed is 2MB.',
        ]
        );      

        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Define the directory to store the image
            $directory = 'signatures'; // Update this directory as needed

            // Store the image in the 'images' directory within 'storage/app/public'
            $image->storeAs('public/' . $directory, $imageName);

            // Assign the image name to the 'dropzone_file' attribute in the validated data
            $validatedData['upload'] = $imageName;
        }
        if ($request->hasFile('upload2')) {
            $image2 = $request->file('upload2');
            $imageName2 = time() . '_2.' . $image2->getClientOriginalExtension();
        
            // Define the directory to store the second image
            $directory2 = 'signatures'; // Update this directory as needed
        
            // Store the image in the specified directory within 'storage/app/public'
            $image2->storeAs('public/' . $directory2, $imageName2);
        
            // Assign the image name to the 'upload2' attribute in the validated data
            $validatedData['upload2'] = $imageName2;
        }

        try {
            // Save the adoption instance
            $adoptionAnswer = new AdoptionAnswer();
            $adoptionAnswer->adoption_id = $adoptionId;
            $adoptionAnswer->fill($validatedData);
            $adoptionAnswer->save(); 
        } catch (\Exception $e) {
            // Log the error or use dd($e) to dump the error and investigate
            dd($e);
        }
  
        return redirect()->back()->with(['adoption_answer' => true]);
    }
    
}
