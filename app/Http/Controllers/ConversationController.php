<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return Conversation::where('user_one_id', $user->id)
                           ->orWhere('user_two_id', $user->id)
                           ->get();
    }

    public function show($id)
    {
        return Conversation::with('messages')->findOrFail($id);
    }
}
