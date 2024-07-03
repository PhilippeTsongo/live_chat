<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'receiver_id' => 'required|exists:users,id',
            'message' => 'nullable|string',
            'file' => 'nullable|file'
        ]);

        $message = new Message();
        $message->conversation_id = $validatedData['conversation_id'];
        $message->sender_id = auth()->id();
        $message->receiver_id = $validatedData['receiver_id'];
        $message->message = $validatedData['message'];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('messages');
            $message->file_path = $filePath;
        }

        $message->save();

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message, 201);
    }
}

