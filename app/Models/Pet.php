<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        // Define the fields that are fillable here
        'pet_name', 'pet_type', 'breed', 'age', 'color', 'adoption_status', 
        'gender', 'vaccination_status', 'weight', 'size', 'behaviour', 
        'description', 'dropzone_file'
    ];
}
