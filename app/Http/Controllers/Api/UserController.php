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
                ->where('sponsor_user.end_time', '>', now())
                ->orWhere('sponsor_user.start_time', '>', now());
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
        ->whereHas('genres', function ($query) use ($genre) {
            $query->where('name', $genre);
        })
        ->leftJoin('sponsor_user', function ($join) {
            $join->on('users.id', '=', 'sponsor_user.user_id')
            ->where(function ($query) {
                $query->where('sponsor_user.start_time', '<', now())
                        ->where('sponsor_user.end_time', '>', now());
                    });
        })
        ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL THEN 1 ELSE 0 END AS has_active_sponsorship'))
        ->orderByRaw('CASE WHEN sponsor_user.id IS NOT NULL THEN 0 ELSE 1 END')
        ->paginate(6);

        $response = [
            "results" => $users,
            "status" => true,
        ];

        return response()->json($response);
    }

    public function searchByAverageVote($averageVote)
    {
        $averageVote = (int)$averageVote;
        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
            ->leftJoin('sponsor_user', function ($join) {
                $join->on('users.id', '=', 'sponsor_user.user_id')
                ->where(function ($query) {
                    $query->where('sponsor_user.start_time', '<', now())
                            ->where('sponsor_user.end_time', '>', now());
                        });
            })
            ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 1 ELSE 0 END AS has_active_sponsorship'))
            ->where('average_vote', '>=', $averageVote)
            ->orderByRaw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 0 ELSE 1 END')
            ->orderBy('average_vote', 'asc')
            ->paginate(6);
    
        $response = [
            "results" => $users,
            "status" => true,
        ];
    
        return response()->json($response);
    }

    public function searchByReviewCount($minReviewCount)
    {
        // Ottieni il numero minimo di recensioni dalla richiesta
        // $minReviewCount = $request->input('min_review_count');

        // Esegui la query per ottenere gli utenti con almeno il numero minimo di recensioni
        $minReviewCount = (int)$minReviewCount;

        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
            ->leftJoin('sponsor_user', function ($join) {
                $join->on('users.id', '=', 'sponsor_user.user_id')
                ->where(function ($query) {
                    $query->where('sponsor_user.start_time', '<', now())
                            ->where('sponsor_user.end_time', '>', now());
                        });
            })
            ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 1 ELSE 0 END AS has_active_sponsorship'))
            ->where('reviews_count', '>=', $minReviewCount)
            ->orderByRaw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 0 ELSE 1 END')
            ->paginate(6);

        $response = [
            "results" => $users,
            "status" => true,
        ];

        return response()->json($response);
    }

    public function searchUsersByGenreAndAverageVote($genre, $averageVote) {
        $averageVote = (int) $averageVote;
        
        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
            ->whereHas('genres', function ($query) use ($genre) {
                $query->where('name', $genre);
            })
            ->leftJoin('sponsor_user', function ($join) {
                $join->on('users.id', '=', 'sponsor_user.user_id')
                ->where(function ($query) {
                    $query->where('sponsor_user.start_time', '<', now())
                            ->where('sponsor_user.end_time', '>', now());
                        });
            })
            ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 1 ELSE 0 END AS has_active_sponsorship'))
            ->where('average_vote', '>=', $averageVote)
            ->orderByRaw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 0 ELSE 1 END')
            ->orderBy('average_vote', 'asc')
            ->paginate(6);
    
        $response = [
            "results" => $users,
            "status" => true,
        ];
    
        return response()->json($response);
    }
    
    public function searchUsersByGenreAndReviewCount($genre, $minReviewCount) {
        $minReviewCount = (int) $minReviewCount;
    
        $users = User::with('genres', 'sponsors', 'votes', 'reviews')
            ->whereHas('genres', function ($query) use ($genre) {
                $query->where('name', $genre);
            })
            ->where('reviews_count', '>=', $minReviewCount)
            ->leftJoin('sponsor_user', function ($join) {
                $join->on('users.id', '=', 'sponsor_user.user_id')
                ->where(function ($query) {
                    $query->where('sponsor_user.start_time', '<', now())
                            ->where('sponsor_user.end_time', '>', now());
                        });
            })
            ->addSelect('users.*', DB::raw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 1 ELSE 0 END AS has_active_sponsorship'))
            ->orderByRaw('CASE WHEN sponsor_user.id IS NOT NULL AND sponsor_user.end_time > NOW() THEN 0 ELSE 1 END')
            ->orderBy('reviews_count', 'asc')
            ->paginate(6);
    
        $response = [
            "results" => $users,
            "status" => true,
        ];
    
        return response()->json($response);
    }
}
