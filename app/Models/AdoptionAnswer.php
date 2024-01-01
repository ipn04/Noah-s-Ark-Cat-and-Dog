<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionAnswer extends Model
{
    use HasFactory;
    protected $table = 'adoption_answers'; 

    protected $fillable = [
        'adoption_id',
        'first_question',
        'second_question',
        'third_question',
        'fourth_question',
        'fifth_question',
        'sixth_question',
        'sevent_question',
        'eight_question',
        'ninth_question',
        'tenth_question',
        'eleventh_question',
        'twelfth_question',
        'thirteenth_question',
        'fourteenth_question',
        'fifteenth_question',
        'seventeenth_question',
        'eighteenth_question',
        'nineteenth_question',
        'twentieth_question',
        'twentyfirst_question',
        'twentysecond_question',
        'twentythird_question',
        'stage',    
        'upload',
        'upload2',
    ];

    public function adoption()
    {
        return $this->belongsTo(Adoption::class);
    }
}
