<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'adoption'; // Set the correct table name
    protected $fillable = ['pet_id', 'application_id', 'stage', 'contract']; // Fillable fields in the 'adoption' table
    protected $casts = [
        'stage' => 'integer',
    ];

    public function pet()  
    {
        return $this->belongsTo(Pet::class); // Assuming an adoption belongs to a Pet
    }
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id'); // Assuming an adoption belongs to an Application
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
