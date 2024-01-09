<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Store Moderator',
            'email' => 'moderator@sth.com',
            'username' => 'moderator',
            'password' => Hash::make('password'),
            'role' => 'moderator',
        ]);
        
        User::create([
            'name' => 'Agba Developer',
            'email' => 'admin@sth.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
