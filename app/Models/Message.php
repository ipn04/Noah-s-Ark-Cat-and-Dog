<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'concern', 'content'];
    protected $table = 'messages';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id'); 
    }
    
    public function threads() {
        return $this->hasMany(MessageThread::class, 'parent_message_id');
    }
    public function scopeUnreadCount($query, $userId)
    {
        return $query->whereNull('read_at')
            ->where('receiver_id', $userId)
            ->where('sender_id', '!=', $userId)
            ->count();
    }
}
