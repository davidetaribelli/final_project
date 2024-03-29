<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vote;
use App\Models\Genre;
use App\Models\Sponsor;


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
        $sponsors = Sponsor::all();
        foreach ($users as $user) {
            $newUser = new User();

            $newUser -> name = $user['name'];
            $newUser -> surname = $user['surname'];
            $newUser -> email = $user['email'];
            $newUser -> password = bcrypt($user['password']);
            $newUser -> img = "placeholders/placeholder.jpg";
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
            $averageVote = count($arrayVotes) > 0 ? array_sum($arrayVotes) / count($arrayVotes) : 0;

            // Imposta il voto medio sull'utente
            $newUser->average_vote = $averageVote;
            $newUser -> save();


            $numberGenres = rand(1,3);
            $arrayGenres = [];
            for ($i=0; $i < $numberGenres; $i++) { 
                $arrayGenres[] = $genres->random()->id;
            }
            $newUser->genres()->attach(array_unique($arrayGenres));

            $isSponsored = rand(0,2);
            if ($isSponsored == 1) {
                $newUser->sponsors()->attach($sponsors->random()->id);
            }
            // $sponsor = [];
            // for ($i=0; $i < $numberGenres; $i++) { 
            //     $arrayGenres[] = $genres->random()->id;
            // }
            // $newUser->genres()->attach(array_unique($arrayGenres));
        }
    }
}
