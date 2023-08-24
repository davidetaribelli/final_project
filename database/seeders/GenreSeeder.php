<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Genre::truncate();
        Schema::enableForeignKeyConstraints();

        $genres = config('genres');

        foreach ($genres as $genre) {
            $newGenre = new Genre();

            $newGenre -> name = $genre['name'];

            $newGenre -> save();
        }
    }
}
