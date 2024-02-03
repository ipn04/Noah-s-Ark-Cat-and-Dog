<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    use HasFactory;
    protected $table = 'message_threads';
    protected $fillable = ['sender_id', 'receiver_id', 'parent_message_id', 'content'];

    public function message()
    {
        return $this->belongsTo(Message::class, 'parent_message_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function getReceiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function scopeUnreadCount($query, $userId)
    {
        return $query->whereNull('read_at')
            ->where('receiver_id', $userId)
            ->where('sender_id', '!=', $userId)
            ->count();
    }
}
