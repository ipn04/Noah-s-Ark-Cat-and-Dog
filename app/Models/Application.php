<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'application';
    protected $fillable = ['user_id', 'application_type']; // Fillable fields in the 'application' table

    protected static function booted()
    {
        static::creating(function ($application) {
            $application->application_type = 'application_form'; // Set default value for application_type
        });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming an application belongs to a User
    }
    
}
