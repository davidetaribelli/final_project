<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users= User::with('genres', 'sponsors', 'votes', 'reviews')->paginate(6);

        $response = [
            "results" => $users,
            "status" => true,
        ];

        return response()->json($response);
    }
}
