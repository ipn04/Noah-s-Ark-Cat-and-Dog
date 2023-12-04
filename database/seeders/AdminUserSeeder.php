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
        $user->save();
    }
}
