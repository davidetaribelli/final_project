<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SponsorUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        

        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
        ->leftJoin('sponsor_user', function ($join) {
            $join->on('users.id', '=', 'sponsor_user.user_id')
                ->where('sponsor_user.end_time', '>', now());
        })
        ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 1 ELSE 0 END AS has_active_sponsorship'))
        // Aggiungi una clausola orderByRaw per ordinare prima gli utenti con sponsorizzazioni attive
        ->orderByRaw('CASE WHEN EXISTS (SELECT * FROM sponsor_user su WHERE su.user_id = users.id AND su.end_time > NOW()) THEN 0 ELSE 1 END')
        ->paginate(6);
    
        $response = [
            "results" => $users,
            "status" => true,
        ];
    
        DB::flushQueryLog();
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

    public function getUsersByGenre($genre)
    {
        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
            ->leftJoin('sponsor_user', function ($join) {
                $join->on('users.id', '=', 'sponsor_user.user_id')
                    ->where('sponsor_user.end_time', '>', now());
            })
            ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 1 ELSE 0 END AS has_active_sponsorship'))
            ->whereHas('genres', function ($query) use ($genre) {
                $query->where('name', $genre);
            })
            ->orderByRaw('CASE WHEN EXISTS (SELECT * FROM sponsor_user su WHERE su.user_id = users.id AND su.end_time > NOW()) THEN 0 ELSE 1 END')
            ->paginate(6);

        $response = [
            "results" => $users,
            "status" => true,
        ];

        return response()->json($response);
    }

    public function searchByAverageVote(Request $request)
    {

        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
        ->paginate(6);
    
        $response = [
            "results" => $users,
            "status" => true,
        ];
    
        return response()->json($response);
    //     $users = User::with('genres', 'sponsors', 'votes', 'reviews')
    //     ->leftJoin('user_vote', 'users.id', '=', 'user_vote.user_id')
    //     ->leftJoin('votes', 'user_vote.vote_id', '=', 'votes.id')
    //     ->groupBy('users.id')
    //     ->havingRaw('AVG(votes.vote) >= 3')
    //     ->paginate(6);

    // $response = [
    //     "results" => $users,
    //     "status" => true,
    // ];

    // return response()->json($response);

        // $averageVote = $request->input('average_vote');

        // $users = User::with('genres', 'sponsors', 'votes', 'reviews')
        //     ->leftJoin('sponsor_user', function ($join) {
        //         $join->on('users.id', '=', 'sponsor_user.user_id')
        //             ->where('sponsor_user.end_time', '>', now());
        //     })
        //     // ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 1 ELSE 0 END AS has_active_sponsorship'))
        //     ->leftJoin('user_vote', 'users.id', '=', 'user_vote.user_id')
        //     ->leftJoin('votes', 'user_vote.vote_id', '=', 'votes.id')
        //     ->groupBy('users.id')
        //     ->havingRaw('AVG(votes.vote) >= ?', [$averageVote])
        //     // ->orderByRaw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 0 ELSE 1 END')
        //     ->paginate(6);
    
        // $response = [
        //     "results" => $users,
        //     "status" => true,
        // ];
    
        // return response()->json($response);
    }
}
