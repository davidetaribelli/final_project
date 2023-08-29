<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users= User::with("genres", "sponsors", "votes", "reviews")->paginate(6);

         $response=[
            'success' => true,
            'results' => $users,
        ];
        return response()->json($response);
    }
}
