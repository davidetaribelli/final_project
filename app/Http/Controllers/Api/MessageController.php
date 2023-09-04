<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function Message(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
        ]);

    $message = new Message();
    $message->user_id = $request->input('user_id');
    $message->name = $request->input('name');
    $message->email = $request->input('email');
    $message->message = $request->input('message');
    // Altri campi se necessario

    // Salva la recensione nel database
    $message->save();
    
    $response = [
        "message" => "Messaggio inviato, sarai contattato/a il prima possibile ",
        "status" => true,
        ];

        return response()->json($response);
    }
}
