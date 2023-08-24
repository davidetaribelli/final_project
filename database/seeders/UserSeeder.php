<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vote;
use App\Models\Genre;


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
        $votes = Vote::all();
        $genres = Genre::all(); 
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
            $numberVotes = rand(1,3);
            $arrayVotes = [];
            for ($i=0; $i < $numberVotes; $i++) { 
                $arrayVotes[] = $votes->random()->id;
            }
            $newUser->votes()->attach(array_unique($arrayVotes));

            $numberGenres = rand(1,3);
            $arrayGenres = [];
            for ($i=0; $i < $numberGenres; $i++) { 
                $arrayGenres[] = $genres->random()->id;
            }
            $newUser->genres()->attach(array_unique($arrayGenres));
        }
    }
}
