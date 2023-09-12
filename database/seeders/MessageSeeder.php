<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Message::truncate();
        Schema::enableForeignKeyConstraints();

        $messages = [
            [
                'user_id' => 1,
                'name' => 'Giulia',
                'email' => 'giuliaprova@gmail.com',
                'message' => 'Salve, sarei interessata alla sua presenza per il mio matrimonio, mi potrebbe ricontattare il prima possibile? Grazie',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Luca',
                'email' => 'luca.99@gmail.com',
                'message' => 'Ciao Anastasia! Sono un grande fan della tua musica country e pop. Sto cercando artisti talentuosi con cui collaborare e mi piacerebbe discutere la possibilità di lavorare insieme. Hai qualche progetto in corso al momento?',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Simone',
                'email' => 'simo.rossi@gmail.com',
                'message' => 'Anastasia, ho appena visto la tua ultima esibizione e devo dire che sei incredibile sul palco! La tua passione e il tuo talento brillano davvero. Continua così, sei una stella',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Fabrizio',
                'email' => 'fabri.rossi@gmail.com',
                'message' => 'Anastasia, volevo solo dirti quanto ho apprezzato la tua recente performance. La tua musica ha il potere di toccare il cuore delle persone, e hai un modo unico di farlo. Continua a emozionarci con la tua musica straordinaria!',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Eventi spa',
                'email' => 'voci.top@gmail.com',
                'message' => 'Ciao Anastasia, ho ascoltato la tua musica e sono rimasto colpito dalla tua versatilità. Sto cercando nuove voci per un progetto country/pop che sto pianificando. Saresti interessata a discutere la possibilità di una collaborazione?',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'name' => 'Ludovica',
                'email' => 'ludo12@gmail.com',
                'message' => 'Ciao, potresti contattarmi telefonicamente al n 3336967845 ?',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 20,
                'name' => 'Andrea',
                'email' => 'andre@gmail.com',
                'message' => "Ciao Andre, la tua musica classica mi ha profondamente colpito. Sto cercando di lavorare con musicisti talentuosi in questo genere. Hai mai considerato l'idea di collaborare con altri artisti? Mi piacerebbe esplorare le possibilità insieme a te.",
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 20,
                'name' => 'Chiara',
                'email' => 'chia.rossi@gmail.com',
                'message' => 'Ciao, ho avuto modo di assistere ad una tua esibizione al matrimonio di una mia cara amica! Volevo farti i miei più sentiti complimenti!',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 17,
                'name' => 'Simone',
                'email' => 'Fmazilu90@gmail.com',
                'message' => 'Ciao Antonio, stiamo pianificando un evento speciale, ma sarebbe necessario che tu ti spostassi dalla tua regione per esibirsi con noi. Saresti disposto a considerare questa possibilità? La tua presenza sarebbe davvero importante per noi.',
                'date' => Carbon::now(),
            ],
            [
                'user_id' => 17,
                'name' => 'Davide',
                'email' => 'davide@gmail.com',
                'message' => 'Sono interessato a conoscere i tuoi servizi musicali e ottenere informazioni sul prezzo per eventi. Mi piacerebbe anche sapere se sei disponibile a spostarti dalla tua regione per esibizioni al di fuori della tua zona. Grazie mille!',
                'date' => Carbon::now(),
            ],
           
        ];

        foreach ($messages as $message){
            $newMessage = new Message();

            $newMessage-> user_id = $message['user_id'];
            $newMessage-> name = $message['name'];
            $newMessage-> email = $message['email'];
            $newMessage-> message = $message['message'];
            $newMessage-> date = $message['date'];

            $newMessage->save();

        }
    }
}
