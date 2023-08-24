<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votes = [
            [
                "vote" => 1, 
            ],
            [
                "vote" => 2, 
            ],
            [
                "vote" => 3, 
            ],
            [
                "vote" => 4, 
            ],
            [
                "vote" => 5, 
            ],
        ];

        foreach($votes as $vote){
            $newVote = new Vote();

            $newVote -> vote = $vote["vote"];

            $newVote-> save();
        }
    }
}
