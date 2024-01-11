<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;
    protected $table = 'adoption'; // Set the correct table name

    protected $fillable = ['pet_id', 'application_id', 'stage', 'contract']; // Fillable fields in the 'adoption' table

    public function pet()
    {
        return $this->belongsTo(Pet::class); // Assuming an adoption belongs to a Pet
    }
    public function application()
    {
        return $this->belongsTo(Application::class); // Assuming an adoption belongs to an Application
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
