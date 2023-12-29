<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Noahs Ark';
        $user->email = 'noahsark@gmail.com';
        $user->role = 'admin';
        $user->password = Hash::make('admin123'); // Replace 'your_password_here' with the desired password
        $user->firstname = 'Noahs Ark';
        $user->gender = 'Noahs Ark';
        $user->birthday = '1990-01-01';
        $user->civil_status = 'Noahs Ark';
        $user->region = 'Noahs Ark';
        $user->province = 'Noahs Ark';
        $user->city = 'Noahs Ark';
        $user->barangay = 'Noahs Ark';
        $user->street = 'Noahs Ark';
        $user->phone_number = '1234567890';
        $user->profile_image = 'Noahs Ark';
        $user->save();
    }
}
