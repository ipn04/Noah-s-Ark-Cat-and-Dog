<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User();
        $user1->name = 'Cuarez';
        $user1->email = 'czarinakrisel123@gmail.com';
        $user1->role = 'user';
        $user1->password = Hash::make('passwordss'); // Replace 'your_password_here' with the desired password
        $user1->firstname = 'Czarina';
        $user1->gender = 'female';
        $user1->birthday = '1990-01-01';
        $user1->civil_status = 'single';
        $user1->region = 'Noahs Ark';
        $user1->province = 'Noahs Ark';
        $user1->city = 'Noahs Ark';
        $user1->barangay = 'Noahs Ark';
        $user1->street = 'Noahs Ark';
        $user1->phone_number = '09566216696';
        $user1->profile_image = 'Noahs Ark';
        $user1->save();
    }
}
