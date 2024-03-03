<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = ['application_id', 'sender_id', 'receiver_id', 'concern', 'message', 'read_at', 'mark_as_read'];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
