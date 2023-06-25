<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['email' => 'admin@medical.com', 'type' => 'admin'],
            ['email' => 'doctor@medical.com', 'type' => 'doctor'],
            ['email' => 'patient@medical.com', 'type' => 'patient'],
        ];
        foreach ($users as $user) {
            User::factory(1)->create(['email' => $user['email'], 'type' => $user['type']]);
        }
    }
}
