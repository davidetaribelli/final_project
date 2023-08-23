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
        $users = config('store');

        foreach ($users as $user) {
            $newUser = new User();

            $newUser -> name = $user['name'];
            $newUser -> surname = $user['surname'];
            $newUser -> email = $user['email'];
            $newUser -> password = $user['password'];
            $newUser -> img = $user['img'];
            $newUser -> region = $user['region'];
            $newUser -> phone = $user['phone'];
            $newUser -> cachet = $user['cachet'];
            $newUser -> experience = $user['experience'];

            $newUser -> save();
        }
    }
}
