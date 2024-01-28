<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class MessageController extends Controller
{   
    public function store(Request $request) {
        $senderId = auth()->user()->id;
        $adminId = User::where('role', 'admin')->first()->id;
        
        $message = new Message([
            'sender_id' => $senderId,
            'receiver_id' => $adminId,
            'concern' => $request->input('concern'), 
            'content' => $request->input('content'), 
        ]);
        
        $message->save();

        return redirect()->back()->with(['message_sent' => true]);
    }
    public function displayMessage() {
        $admin = User::where('role', 'admin')->first();
        $message = Message::all();        

        return view('user_contents.messages', ['admin' => $admin, 'message_sent' => true, 'message' => $message]);
    }
}
