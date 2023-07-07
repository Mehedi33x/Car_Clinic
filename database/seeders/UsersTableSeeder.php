<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            ['name'=> 'Mehedi','email'=> 'mehedi@gmail.com','password'=>bcrypt('12345')],
            ['name'=> 'Hasan','email'=> 'admin@gmail.com','password'=>bcrypt('12345')]
        );
    }
}
