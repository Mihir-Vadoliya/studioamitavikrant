<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$uMW53o5iJDBebx9NgVnECu7aykLiounuN6lTVb1.782ZhsUZFFhje',
            'type' => 'admin',
            'isActive' => 'active'
        ]);
    }
}
