<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        

        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
        ->leftJoin('sponsor_user', function ($join) {
            $join->on('users.id', '=', 'sponsor_user.user_id')
                ->where('sponsor_user.end_time', '>', now());
        })
        ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL THEN 1 ELSE 0 END AS has_active_sponsorship'))
        // Aggiungi una clausola orderByRaw per ordinare prima gli utenti con sponsorizzazioni attive
        ->orderByRaw('CASE WHEN EXISTS (SELECT * FROM sponsor_user su WHERE su.user_id = users.id AND su.end_time > NOW()) THEN 0 ELSE 1 END')
        ->paginate(6);
    
        // Esegui la paginazione
        
    
        $response = [
            "results" => $users,
            "status" => true,
        ];
    
        return response()->json($response);
    }

    public function show($id){
        $users = User::with("genres", 'sponsors', 'votes', 'reviews')->find($id);

        $response = [
            "success" => true,
            "results" => $users
        ];

        return response()->json($response);
    }
}
