<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    use HasFactory;
    protected $table = 'volunteer_application';
    protected $primaryKey = 'id';

    protected $fillable = ['stage'];
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id'); 
    }
}
