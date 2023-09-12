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
                'user_id' => 15,
                'name' => 'Mario',
                'email' => 'mario.rossi@gmail.com',
                'comment' => "Ho avuto l'opportunità di assistere a un evento dove il musicista si è esibito, ma sono rimasto deluso. La sua performance era piatta, senza emozione, e sembrava poco preparato. Non lo consiglierei per futuri eventi.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 15,
                'name' => 'Mathias',
                'email' => 'mathias@gmail.com',
                'comment' => "Il musicista è stato assolutamente eccezionale al nostro matrimonio. La sua voce melodiosa e la sua presenza sul palco hanno creato un'atmosfera magica. Tutti gli ospiti erano entusiasti.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 15,
                'name' => 'Giada',
                'email' => 'giada@gmail.com',
                'comment' => "Il suo talento è straordinario. Ha suonato al nostro evento di beneficenza e ha catturato l'attenzione di tutti con la sua abilità straordinaria. È un vero professionista.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'name' => 'Giorgio',
                'email' => 'giorgionanni@gmail.com',
                'comment' => "Un musicista perfetto per creare un'atmosfera rilassante. La sua performance acustica al nostro evento privato è stata un successo. Gli ospiti sono rimasti incantati dalla sua musica.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'name' => 'Federico',
                'email' => 'federico@gmail.com',
                'comment' => 'Il musicista ha suonato al nostro matrimonio, ma è stato un grande errore. La sua voce era stonata e non era in grado di coinvolgere il pubblico. Gli ospiti erano annoiati, e il nostro giorno speciale è stato rovinato.',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'name' => 'Giada',
                'email' => 'giada@gmail.com',
                'comment' => ' Il musicista ha reso la nostra festa di compleanno indimenticabile. La sua energia sul palco e il modo in cui coinvolge il pubblico sono stati incredibili. Lo consiglio a chiunque cerchi musica di alta qualità.',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'name' => 'Davide',
                'email' => 'davidetaribelli@gmail.com',
                'comment' => 'Un vero professionista. La sua performance al nostro evento aziendale ha dimostrato una grande versatilità musicale. Ha suonato una vasta gamma di generi ed è stato apprezzato da tutti',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'name' => 'Sofia',
                'email' => 'sofia@gmail.com',
                'comment' => "Il musicista è stato una scelta fantastica per il nostro matrimonio. La sua voce potente e il suo repertorio diversificato hanno reso l'evento ancora più speciale. Non potremmo essere più felici della sua performance.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'name' => 'Camilla',
                'email' => 'camilla@gmail.com',
                'comment' => "Abbiamo ingaggiato il musicista per il nostro evento aziendale, ma la sua performance è stata deludente. La sua mancanza di professionalità e la scelta di brani inadeguati hanno reso l'evento meno piacevole per tutti.",
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
