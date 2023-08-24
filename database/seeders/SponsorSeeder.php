<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = config('sponsor');
        foreach ($sponsors as $sponsor) {
            $newSponsor = new Sponsor();

            $newSponsor -> price = $sponsor['price'];
            $newSponsor -> duration = $sponsor['duration'];
            $newSponsor -> description = $sponsor['description'];

            $newSponsor -> save();
        //
        }
    }
}