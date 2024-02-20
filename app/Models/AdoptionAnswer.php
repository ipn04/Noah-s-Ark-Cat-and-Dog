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
        'answers',
        'upload',
        'upload2',
    ];

    public function adoption()
    {
        return $this->belongsTo(Adoption::class);
    }
}
