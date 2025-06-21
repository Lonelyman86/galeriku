<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'fullname' => 'riosraskaa@gmail.com',
            'address' => 'riosraskaa@gmail.com',
            'username' => 'riosraskaa@gmail.com',
            'password' => bcrypt('riosraskaa@gmail.com'),
            'email' => 'riosraskaa@gmail.com',
        ]);

    }
}
