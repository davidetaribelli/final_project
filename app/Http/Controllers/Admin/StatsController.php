<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use App\Models\Vote;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
{
    $messagges = Message::all();
    $reviews = Review::all();
    $votes = Vote::all();
    // Effettua il rendering della vista delle statistiche e passa i dati
    return view('statistiche.index', compact('messagges', 'reviews', 'votes'));
}

}
