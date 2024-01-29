<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageThread;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Events\Messages;
use Illuminate\Http\Response;

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

    public function storeReply(Request $request, $messageId, $receiverId)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required',
        ]);

        $reply = new MessageThread([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiverId,
            'parent_message_id' => $messageId,
            'content' => $request->input('content'),
        ]);
        // dd($reply);
        $reply->save();

        return redirect()->back();
    }

    public function AdminStoreReply(Request $request, $messageId, $receiverId)
    {
        // dd($request)
        // broadcast(new Messages($request->get('content')))->toOthers();
        // dd($request->get('content'));
        
        // dd($request->get('content'));
        try {
            $request->validate([
                'content' => 'required',
            ]);
            $reply = new MessageThread([
                'sender_id' => auth()->id(),
                'receiver_id' => $receiverId,
                'parent_message_id' => $messageId,
                'content' => $request->input('content'),
            ]);
            // dd($reply);
            $reply->save();
            // broadcast(new Messages($reply));
            // event(new Messages($request->input('content')));
            // return redirect()->back();

            return response()->json([$reply]);
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);

            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    public function sendMessage(Request $request)
    {
        event(new Message($request->input('content')));
        return ["success" => true];
    }

    //sa user
    public function displayMessage() {
        $admin = User::where('role', 'admin')->first();
        $user = auth()->user();
        $message = $user->sentMessages; 

        return view('user_contents.messages', ['admin' => $admin, 'message_sent' => true, 'message' => $message]);
    }

    //sa user
    public function messageContent(Request $request, $messageId) {
        $initialMessage = Message::find($messageId);

        broadcast(new Messages($request->get('content')))->toOthers();

        $threads = $initialMessage->threads;

        return view('user_contents.inbox_message.inbox', ['initialMessage' => $initialMessage, 'threads' => $threads, 'content' => $request->get('content')]);
    }

    public function AllMessage() {
        $ShowAllMessage = Message::all();

        return view('admin_contents.messages', ['ShowAllMessage' => $ShowAllMessage]);
    }
    public function AdminInbox(Request $request, $messageId) {
        
        $initialMessage = Message::find($messageId);

        broadcast(new Messages($request->get('content')))->toOthers();
        
        $threads = $initialMessage->threads;      

        return view('admin_contents.inbox', ['initialMessage' => $initialMessage, 'threads' => $threads, 'content' => $request->get('content')]);
    }
}
