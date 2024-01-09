<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerAnswers extends Model
{
    use HasFactory;
    protected $table = 'volunteer_answers';
    protected $primaryKey = 'vanswers_id';
    protected $fillable = ['volunteer_id', 'answers'];

    public function volunteer_application()
    {
        return $this->belongsTo(VolunteerApplication::class, 'volunteer_id'); 
    }
}
