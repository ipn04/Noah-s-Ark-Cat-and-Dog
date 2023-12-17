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
    public function showSentMessages() {
        $parentId = Message::whereNull('parent_id')->first()->id;
        $parentMessage = Message::find($parentId); // Fetch the parent message
        $previousMessageConcern = $parentMessage->concern; // Get the concern of the parent message

        $parentId = Message::whereNull('parent_id')->first()->id;
        $sentMessages = Message::where('sender_id', auth()->id())->get();
        $mainMessages = Message::whereNull('parent_id')->with('replies')->get();
        
        return view('user_contents.inbox_message.inbox', compact('sentMessages', 'mainMessages', 'parentId', 'previousMessageConcern'));
    }

    public function sendMessage(Request $request) {
        $adminName = User::where('role', 'admin')->value('name');
        try {
            // Fetch the admin ID based on certain criteria (e.g., role = 'admin')
            $adminId = User::where('role', 'admin')->first()->id;

            // Validate the request data
            $validatedData = $request->validate([
                'concern' => 'required|string',
                'message' => 'required|string', // Adjust validation rules as needed
            ]);
            $parent_id = null;
            // Create the message data
            $messageData = [
                'admin_id' => $adminId, // Assigning admin ID to the message
                'sender_id' => auth()->id(), // Assuming authenticated user is sending the message
                'concern' => $request->input('concern'),
                'message' => $validatedData['message'],
                'parent_id' => $parent_id,
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
    public function replyToMessage(Request $request)
    {
        $parentId = Message::whereNull('parent_id')->first()->id;
        $parentMessage = Message::find($parentId); // Fetch the parent message
        $previousMessageConcern = $parentMessage->concern; // Get the concern of the parent message
        
        $sentMessages = Message::where('sender_id', auth()->id())->get();
        $mainMessages = Message::whereNull('parent_id')->with('replies')->get();
        
        try {
            // Fetch the admin ID based on certain criteria (e.g., role = 'admin')
            $adminId = User::where('role', 'admin')->first()->id;
            
            // Validate the request data
            $validatedData = $request->validate([
                'concern' => 'required|string',
                'message' => 'required|string',
                'parent_id' => 'required|integer',
            ]);

            // Create the message data
            $messageData = [
                'admin_id' => $adminId,
                'sender_id' => auth()->id(),
                'concern' => $previousMessageConcern,
                'message' => $validatedData['message'],
                'parent_id' => $validatedData['parent_id'], // Use the received parent_id when creating the message
            ];
            
            Message::create($messageData);

            // Return updated messages in JSON response
            return response()->json([
                'mainMessages' => $mainMessages,
                'sentMessages' => $sentMessages,
                'parentId' => $parentId,
                'previousMessageConcern' => $previousMessageConcern,
            ]);
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error replying to message: ' . $e->getMessage());
            // Handle any errors (e.g., log, redirect with error message, etc.)
        }
        // Redirect or render view after replying
    }
}
