<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\AdoptionAnswer;
use App\Models\Application;
use App\Models\Adoption;

use Illuminate\Support\Facades\Storage;

class PetDataController extends Controller
{
    public function showPetManagement()
    {
        $pets = Pet::all(); // Fetch all pets
        $petCount = Pet::count();
        $availpet = Pet::where('adoption_status', 'available')->count(); // Get the count of cats
        $dogCount = Pet::where('pet_type', 'dog')->count();

        return view('admin_contents.pet_management', ['pets' => $pets,'petCount' => $petCount, 'availpet' => $availpet,
        'dogCount' => $dogCount,]);
    }

    public function filterPets(Request $request)
    {
        
        $filteredPets = Pet::query();

        if ($request->category && $request->category !== 'All') {
            $filteredPets->where('pet_type', $request->category);
        }

        if ($request->availability && $request->availability !== 'All') {
            $filteredPets->where('adoption_status', $request->availability);
        }

        $filteredPets = $filteredPets->get();

        // Render the filtered pets view (e.g., pet-listing.blade.php) and return it as a response
        return view('initial_page.pet_lists', ['pets' => $filteredPets])->render();
    }


    public function showPublicPets()
    {
        $pets = Pet::all();

        return view('initial_page.pets', ['pets' => $pets]);
    }

    public function adoptPet($petId)
    {
        $pets = Pet::find($petId);
        if(!$pets) {
            return redirect()->back()->with('error', 'Pet not found');
        }
        return view('user_contents.petcontents', ['pets' => $pets]);
    }

    public function sendAdoption($petId)
    {
        $pets = Pet::find($petId);
        if(!$pets) {
            return redirect()->back()->with('error', 'Pet not found');
        }
        return view('user_contents.adoptionform', ['pets' => $pets, 'petId' => $petId]);
    }

    public function  showUserPets()
    {
        $userId = auth()->user()->id;

        // Find the user's application ID
        $userApplication = Application::where('user_id', $userId)->first();
    
        // Fetch the adoption answer for the user's application, assuming it exists
        $stage = null;
        if ($userApplication) {
            $adoption = Adoption::where('application_id', $userApplication->id)->first();
            if ($adoption) {
                $stage = AdoptionAnswer::where('adoption_id', $adoption->id)
                    ->where('stage', '0')
                    ->first();
            }
        }
    
        $pets = Pet::where('adoption_status', 'available')->get();
        if ($pets->isNotEmpty()) {

            return view('dashboards.user_dashboard', ['pets' => $pets, 'stage' => $stage]);
        } else {
            // Handle case when no pets are found
            return view('dashboards.user_dashboard', ['pets' => $pets, 'stage' => $stage]);
        }
        
    }

    public function showPet($id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        return response()->json(['pet' => $pet]);
    }

    public function addPet(Request $request) {
        // Check the MIME type
        // dd($request->all());
        $validatedData = $request->validate([
            // Validation rules for other fields
            'pet_name' => 'required',
            'pet_type' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'color' => 'required',
            'adoption_status' => 'required',
            'gender' => 'required',
            'vaccination_status' => 'required',
            'weight' => 'required', 
            'size' => 'required',
            'behaviour' => 'required',
            'description' => 'required',
            'dropzone_file' => 'required', // If this is a file upload
        ],
        [
            'dropzone_file.required' => 'The pet image is required. Please, try again',
            'dropzone_file.image' => 'The file must be an image.',
            'dropzone_file.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'dropzone_file.max' => 'Maximum file size allowed is 2MB.',]
        );

        if ($request->hasFile('dropzone_file')) {
            $image = $request->file('dropzone_file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
        
            // Define the directory to store the image
            $directory = 'images'; // Update this directory as needed
        
            // Store the image in the 'images' directory within 'storage/app/public'
            $image->storeAs('public/' . $directory, $imageName);
        
            // Assign the image name to the 'dropzone_file' attribute in the validated data
            $validatedData['dropzone_file'] = $imageName;
        }
           
        $pet = Pet::create($validatedData);

        return redirect()->route('admin.pet.management')->with(['pet' => $pet, 'pet_added' => true]);
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        // Validate the updated data
        $validatedData = $request->validate([
            'pet_name' => 'sometimes|required',
            'pet_type' => 'sometimes|required',
            'breed' => 'sometimes|required',
            'age' => 'sometimes|required',
            'color' => 'sometimes|required',
            'adoption_status' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'vaccination_status' => 'sometimes|required',
            'weight' => 'sometimes|required',
            'size' => 'sometimes|required',
            'behaviour' => 'sometimes|required',
            'description' => 'sometimes|required',
            'dropzone_file' => 'sometimes|required',
        ], [
            'dropzone_file.image' => 'The file must be an image.',
            'dropzone_file.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'dropzone_file.max' => 'Maximum file size allowed is 2MB.',
        ]);

        // Update pet details in the database
        
        $pet->fill($validatedData);

        if ($request->hasFile('dropzone_file')) {
            // Remove the old image from storage (if exists)
            $oldImagePath = 'public/images/' . $pet->dropzone_file;
            if (Storage::disk('local')->exists($oldImagePath)) {
                Storage::disk('local')->delete($oldImagePath);
            }
        
            // Store the new image in the storage
            $image = $request->file('dropzone_file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $directory = 'images';
            $image->storeAs('public/' . $directory, $imageName);
        
            // Update the image file name in the database
            $pet->dropzone_file = $imageName;
        }
        
        if ($pet->isDirty()) {
            $pet->save();
            return redirect()->route('admin.pet.management')->with(['pet' => $pet, 'pet_updated' => true]);
        }
        
    
        // No changes were made
        return redirect()->route('admin.pet.management')->with(['pet' => $pet, 'pet_updated' => true]);
    }

    public function delete($id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        $imagePath = 'public/images/' . $pet->dropzone_file;
        if (Storage::disk('local')->exists($imagePath)) {
            Storage::disk('local')->delete($imagePath);
        }

        $pet->delete();

        session()->flash('pet_deleted', true);
        
        return response()->json(['message' => 'Pet deleted successfully']);
    }
}

