<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Rafael Costa',
                'email' => 'rafael@test.com',
                'password' => bcrypt('123456'),
            ],
        );
        User::create(
            [
                'name' => 'Jeremias Antunez',
                'email' => 'jere@test.com',
                'password' => bcrypt('123456'),
            ],
        );
    }
}
