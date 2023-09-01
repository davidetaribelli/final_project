<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function post(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'name' => 'required|string',
        'email' => 'required|email',
        'comment' => 'required|string',
    ]);

    $review = new Review();
    $review->user_id = $request->input('user_id');
    $review->name = $request->input('name');
    $review->email = $request->input('email');
    $review->comment = $request->input('comment');
    // Altri campi se necessario

    // Salva la recensione nel database
    $review->save();

    $response = [
        "message" => "Recensione aggiunta con successo",
        "status" => true,
    ];

    return response()->json($response);
    }
}