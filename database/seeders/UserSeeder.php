<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Nonstandard\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'id' => Uuid::uuid4(),
            'name' => 'Administrator',
            'role' => 'super-admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123')
        ]);
        User::create([
            'id' => Uuid::uuid4(),
            'name' => 'Rizal Erwiansyah',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123')
        ]);
    }
}
