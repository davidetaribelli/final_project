<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
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
            [
                'user_id' => 1,
                'name' => 'Davide',
                'email' => 'davide23@gmail.com',
                'comment' => 'E` stato fantastico!',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'name' => 'Mathias',
                'email' => 'mathi20@gmail.com',
                'comment' => 'Ottimo lavoro!!',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'name' => 'Giada',
                'email' => 'Giadapir@gmail.com',
                'comment' => 'E` stato fantastico!',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Giulio',
                'email' => 'Giulio@gmail.com',
                'comment' => "Anastasia è indubbiamente un talento da non sottovalutare. La sua musica ha un fascino unico che cattura l'attenzione di chiunque la ascolti. Non vedo l'ora di sentire cosa ci riserverà in futuro. Continua così!",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Giada',
                'email' => 'giada.pirone@gmail.com',
                'comment' => "Ho avuto l'opportunità di ascoltare Anastasia in un piccolo club l'altra sera. Sebbene sia indiscutibilmente talentuosa, ho notato alcune incertezze nella sua performance. Forse è solo una fase di crescita, ma penso che potrebbe beneficiare di una maggiore sicurezza sul palco.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Luca',
                'email' => 'Luca@gmail.com',
                'comment' => "Ho seguito la carriera di Anastasia fin dall'inizio e sono felice di vedere quanto sia cresciuta come artista. La sua voce è impeccabile e la sua passione per la musica traspare in ogni nota. Sono sicuro che ha un futuro luminoso davanti a sé.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Chiara',
                'email' => 'Chiara@gmail.com',
                'comment' => "Siamo stati fortunati ad avere Anastasia esibirsì alla festa di compleanno di mio figlio. La sua voce ha portato un tocco di magia all'evento. Anastasia è stata eccezionale nell'interagire con i nostri ospiti di tutte le età e ha reso la serata indimenticabile. La sua selezione musicale era perfetta e ha creato un'atmosfera allegra e coinvolgente. Grazie, Anastasia, per aver reso il compleanno di mio figlio così speciale!",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 20,
                'name' => 'Luigi',
                'email' => 'Luigi@gmail.com',
                'comment' => "Ho ascoltato la musica di Andre in diverse occasioni, e mentre apprezzo il suo virtuosismo, vorrei vederlo esplorare un po' di più la sua creatività. Sono sicuro che potrebbe portare una nuova prospettiva e freschezza alla musica classica.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 20,
                'name' => 'Rossana',
                'email' => 'Rossana@gmail.com',
                'comment' => "La performance di Andre è stata il punto culminante della serata. La sua abilità nell'interpretare le opere dei grandi compositori classici è impressionante. Spero di avere l'opportunità di ascoltarlo di nuovo in futuro.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 20,
                'name' => 'Fabio',
                'email' => 'Fabio@gmail.com',
                'comment' => "Andrea è indubbiamente un talento da non sottovalutare. La sua musica ha un fascino unico che cattura l'attenzione di chiunque la ascolti. Non vedo l'ora di sentire cosa ci riserverà in futuro. Continua così!",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 17,
                'name' => 'Dajana',
                'email' => 'Dajana@gmail.com',
                'comment' => "Ho visto Antonio suonare in diverse occasioni, e mentre apprezzo il suo virtuosismo, vorrei vederlo esplorare un po' di più la sua creatività. Sono sicuro che potrebbe portare una nuova prospettiva alla sua musica",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 17,
                'name' => 'Lorenzo',
                'email' => 'Lorenzo@gmail.com',
                'comment' => "Ho avuto il privilegio di assistere a una delle esibizioni di Antonio, e sono rimasto colpito dalla sua maestria con lo strumento. La sua passione e dedizione alla musica emergono chiaramente nella sua performance. Se avete l'opportunità di vederlo suonare dal vivo, non ve la lasciate sfuggire!",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 17,
                'name' => 'Ludovica',
                'email' => 'Ludovica@gmail.com',
                'comment' => "Antonio è davvero talentuoso. La sua musica ha la capacità di trasportarti in un mondo di emozioni. Ho avuto la fortuna di avere lui come musicista in un evento speciale, e ha aggiunto un tocco magico all'atmosfera. Consiglio vivamente la sua musica.",
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

            $user = User::find($newReview->user_id);
                if ($user) {
                    $user->reviews_count = $user->reviews()->count();
                    $user->save();
                }

        }
    }
}
