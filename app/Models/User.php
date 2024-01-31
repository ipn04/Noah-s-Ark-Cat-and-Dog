<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isUser()
    {
        return $this->role === 'user';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'gender',
        'birthday',
        'civil_status',
        'region',
        'province',
        'city',
        'barangay',
        'street',
        'phone_number',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function application()
    {
        return $this->hasOne(Application::class);
    }
    public function adoption()
    {
        return $this->hasOneThrough(Adoption::class, Application::class, 'user_id', 'application_id');
    }
    public function sentMessages() {
        return $this->hasMany(Message::class, 'sender_id');
    }
     /**
     * The channels the user receives notification broadcasts on.
     */
    public function receivesBroadcastNotificationsOn(): string
    {
        return 'users.'.$this->id;
    }
}
