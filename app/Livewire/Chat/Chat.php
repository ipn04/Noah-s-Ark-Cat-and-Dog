<?php

namespace App\Livewire\Chat;
use App\Models\Message;

use Livewire\Component;

class Chat extends Component
{
    public $messageId;  
    public $selecte4dConversation;   

    public function mount($messageId)
    {
        $this->selecte4dConversation = Message::findOrFail($this->messageId);
        // dd($this->selecte4dConversation);
    }

    public function render()
    {
        return view('livewire.chat.chat');
    }
}
