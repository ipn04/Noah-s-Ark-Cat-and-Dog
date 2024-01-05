<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleInterview extends Model
{
    use HasFactory;
    protected $primaryKey = 'interview_id';
    
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id'); 
    }
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
