<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;
    protected $table = 'adoption'; // Set the correct table name

    protected $fillable = [
        'social_media',
        'occupation',
        'alternate_contact',
        'relation',
        'relationship',
        // Add other fields here as needed
    ];
}
