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
