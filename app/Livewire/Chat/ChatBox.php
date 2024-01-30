<?php

namespace App\Livewire\Chat;
use App\Models\Message;
use App\Models\MessageThread;

use Livewire\Component;

class ChatBox extends Component
{
    public $messageId;  
    public $selectedConversation;   
    public $body;   
    public $loadedMessages;  

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

    }
    
    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
