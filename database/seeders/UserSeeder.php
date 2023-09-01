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
            'name' => 'Super Admin',
            'email' => 'admin@vidantaca.com.np',
            'password' => Hash::make('malaiktha1290'),
        ]);
        
        User::create([
            'name' => 'Nesa Admin',
            'email' => 'admin@nepalesports.org',
            'password' => Hash::make('malaiktha1290'),
        ]);
        User::create([
            'name' => 'Sumin Shrestha',
            'email' => 'sumnsth@gmail.com',
            'password' => Hash::make('malaiktha1290'),
        ]);
    }
}
