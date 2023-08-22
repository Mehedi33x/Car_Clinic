<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [

            ['name' => 'Mehedi', 'email' => 'mehedi@gmail.com', 'password' => bcrypt('12345'), 'role' => 'admin'],
            ['name' => 'Hasan', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345'), 'role' => 'admin']
        ];

        User::insert($user);
    }
}
