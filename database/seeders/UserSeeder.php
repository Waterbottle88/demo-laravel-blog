<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $user = [
                    'name'=> 'admin',
                    'email'=> 'admin@gmail.com',
                    'password'=> '12345678',
                    'role'=>0,
                ];
        User::query()->create($user);
    }
}
