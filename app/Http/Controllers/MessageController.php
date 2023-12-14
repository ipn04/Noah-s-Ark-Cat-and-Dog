<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class MessageController extends Controller
{   
    public function displayMessage() {
        $adminName = User::where('role', 'admin')->value('name');

        return view('user_contents.messages', ['adminName' => $adminName, 'message_sent' => true]);
    }

    public function sendMessage(Request $request) {
        try {
            // Fetch the admin ID based on certain criteria (e.g., role = 'admin')
            $adminId = User::where('role', 'admin')->first()->id;

            // Validate the request data
            $validatedData = $request->validate([
                'concern' => 'required|string',
                'message' => 'required|string', // Adjust validation rules as needed
            ]);

            // Create the message data
            $messageData = [
                'admin_id' => $adminId, // Assigning admin ID to the message
                'sender_id' => auth()->id(), // Assuming authenticated user is sending the message
                'concern' => $request->input('concern'),
                'message' => $validatedData['message'],
                'parent_id' => $request->input('parent_id'),
                // Other message data
            ];

            // Log the message data
            Log::info('Message Data:', $messageData);   

            // Create and save the message
            Message::create($messageData);
            
            // Handle success (e.g., redirect, response, etc.)
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error creating message: ' . $e->getMessage());
            // Handle any errors (e.g., log, redirect with error message, etc.)
        }

        return redirect()->route('user.messages', ['adminName' => $adminName])->with(['message_sent' => true]);
    }
}
