<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show($id)
    {
        // dd($message);
        $message = Message::find($id);
        
        return view('admin.users.singleMessage', compact('message'));
    }
    
}
