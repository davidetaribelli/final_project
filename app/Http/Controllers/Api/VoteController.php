<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function addVote(Request $request)
{
    // Estrarre i dati dalla richiesta Vue.js
    $userId = $request->input('user_id');
    $voteId = $request->input('vote_id');
    $date = $request->date('date');

    // Aggiungi una nuova voce nella tabella ponte
    DB::table('user_vote')->insert([
        'user_id' => $userId,
        'vote_id' => $voteId,
        'date' => $date,
    ]);

    // Calcola il voto medio per l'utente
    $user = User::find($userId);
    if ($user) {
        $user->calculateAverageVote();
    }


    // Restituisci una risposta di successo o qualsiasi altra risposta necessaria
    return response()->json(['message' => 'Voto aggiunto con successo']);
}
}
