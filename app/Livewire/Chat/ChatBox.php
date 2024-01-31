<?php

namespace App\Livewire\Chat;
use App\Models\Message;
use App\Models\MessageThread;
use App\Notifications\MessageSent;
use Livewire\Component;

class ChatBox extends Component
{
    public $messageId;  
    public $selectedConversation;   
    public $body;   
    public $loadedMessages;  

    protected $listeners=[
        'loadMore'
    ];

    public function getListeners()
    {
        $auth_id= auth()->user()->id;

        return [
            'loadMore',
            "echo-private:users.{$auth_id},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated"=>'broadcastedNotications'
        ];
    }

    function broadcastedNotications($event) {
        // dd($event);
        if($event['type']== MessageSent::class) {
            if($event['content'] == $this->selectedConversation->id) {
                $this->dispatch('scroll-bottom');

                $newMessage = MessageThread::find($event['message_id']);

                $this->loadedMessages->push($newMessage);
            }
        }
    }

    public function loadMore() : void
    {
        $this->loadMessages();
    }
    public function loadMessages()
    {
        $this->loadedMessages = MessageThread::where('parent_message_id', $this->messageId)->get();
    }
    
    public function mount($messageId)
    {
        $this->selectedConversation = Message::findOrFail($messageId);
        $threads = $this->selectedConversation->threads;      

        $this->loadMessages();
    }
    public function sendMessage() {
        // dd($this->selectedConversation->receiver_id);
        $this->validate(['body' => 'required|string']);

        $createdMessage = MessageThread::create([
            'sender_id' => auth()->id(),
            'receiver_id' => ($this->selectedConversation->sender_id !== auth()->id()) 
                      ? $this->selectedConversation->sender_id 
                      : $this->selectedConversation->receiver_id,
            'parent_message_id' => $this->selectedConversation->id,
            'content'=>$this->body
        ]);

        $this->reset('body');
        // dd($createdMessage);
        $this->dispatch('scroll-bottom');
        
        $this->loadedMessages->push($createdMessage);

        // $this->selectedConversation->updated_at = now();
        // $this->selectedConversation->save();

        $latestThread = $this->loadedMessages->sortByDesc('created_at')->first();

        if ($latestThread) {
            $receiver = $latestThread->getReceiver; // Assuming getReceiver is a relationship method
            $receiver->notify(new MessageSent(
                auth()->user(),
                $createdMessage,
                $this->selectedConversation,
                $receiver->id
            ));
        }
        

    }
    
    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
