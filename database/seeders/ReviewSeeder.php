<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Review::truncate();
        Schema::enableForeignKeyConstraints();

        $reviews = [
            [
                'user_id' => 1,
                'name' => 'Federico',
                'email' => 'federico21@gmail.com',
                'comment' => 'Ottimo lavoro!!',
                'date' => Carbon::now(),
            ],
        ];

        foreach ($reviews as $review){
            $newReview = new Review();

            $newReview-> user_id = $review['user_id'];
            $newReview-> name = $review['name'];
            $newReview-> email = $review['email'];
            $newReview-> comment = $review['comment'];
            $newReview-> date = $review['date'];

            $newReview->save();

        }
    }
}
