<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerAnswers extends Model
{
    use HasFactory;
    protected $table = 'volunteer_answers';
    protected $fillable = ['volunteer_id', 'answers'];
}
