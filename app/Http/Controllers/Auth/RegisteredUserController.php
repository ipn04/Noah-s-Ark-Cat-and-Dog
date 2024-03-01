<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'civil_status' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'profile_image' => ['required'],
        ],
            [
            'profile_image.required' => 'The profile image is required. Please, try again',
            'profile_image.image' => 'The file must be an image.',
            'profile_image.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'profile_image.max' => 'Maximum file size allowed is 2MB.',
            ]
        );   

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
        
            $directory = 'profiles';
        
            $image->storeAs('public/' . $directory, $imageName);
        
            $profileImagePath = $directory . '/' . $imageName;
        }

        // dd($profileImagePath);
        $response = $this->sendOTP($request->phone_number);
        // dd($response->json());

        if ($response->status() >= 200 && $response->status() < 300) {     
            session(['otp_phone_number' => $request->phone_number]);
            session(['otp_code' => $response->json()[0]['code']]);
        
            $registrationData = $request->except(['_token', 'password_confirmation']);
            $registrationData['profile_image'] = $profileImagePath; 
            $request->session()->put('registration_data', $registrationData);
            
            return redirect()->route('verify-otp');
        } else {
            return back()->withErrors(['otp_error' => 'Failed to send OTP. Please try again.'])->with(['account_added' => true]);
        }
    }

    public function showVerificationForm()
    {
        return view('auth.verify-otp');
    }
    /**
     * Send OTP to the specified phone number.
     */
    private function sendOTP($phoneNumber)
    {
        $parameters = array(
            'apikey' => env('SEMAPHORE_API_KEY'),
            'number' => $phoneNumber,
            'message' => 'Thank you for registering!',
            'sendername' => ''
        );

        try {
            $response = Http::post('https://api.semaphore.co/api/v4/otp', $parameters);
            
            if ($response->successful()) {
                return $response;
            } else {
                // Handle unsuccessful response
                return response()->json(['error' => 'Failed to send OTP.'], $response->status());
            }
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'An error occurred while sending OTP.'], 500);
        }
    }
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp1' => 'required|string|max:1',
            'otp2' => 'required|string|max:1',
            'otp3' => 'required|string|max:1',
            'otp4' => 'required|string|max:1',
            'otp5' => 'required|string|max:1',
            'otp6' => 'required|string|max:1',
        ]);

        $otpCode = session('otp_code');
        $phoneNumber = session('otp_phone_number');
        $registrationData = $request->session()->get('registration_data');
        $enteredOTP = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4 . $request->otp5 . $request->otp6;
        
        if ($enteredOTP == $otpCode) {
        session()->forget('otp_code');

        $formattedBirthday = date("Y-m-d", strtotime($registrationData['birthday']));
        $user = User::create([
            'name' => $registrationData['name'],
            'email' => $registrationData['email'],
            'role' => 'user',
            'password' => Hash::make($registrationData['password']),
            'firstname' => $registrationData['firstname'],
            'gender' => $registrationData['gender'],
            'birthday' => $formattedBirthday,
            'civil_status' => $registrationData['civil_status'],
            'region' => $registrationData['selected_region'],
            'province' => $registrationData['selected_province'],
            'city' => $registrationData['selected_city'],
            'barangay' => $registrationData['selected_barangay'],
            'street' => $registrationData['street'],
            'phone_number' => $phoneNumber,
            'profile_image' => $registrationData['profile_image'],
        ]);

        if ($user) {
            return redirect()->route('register')->with(['account_added' => true]);
        } else {
            return back()->withErrors(['registration_error' => 'Failed to create user. Please try again.']);
        }
    }

    return back()->with(['otp_error_flag' => true]);
    }
}
