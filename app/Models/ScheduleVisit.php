<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleVisit extends Model
{
    use HasFactory;
    protected $table = 'schedule_visit';
    protected $primaryKey = 'visit_id';

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id'); 
    }
}
