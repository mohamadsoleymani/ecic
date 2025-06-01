<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\SubMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return Message::with('user')->latest()->get();
    }

    public function show(Message $message)
    {
        return Message::with('user', 'subMessages')->findOrFail($message);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,draft,read (admin) , read (client) , reply , closed',
        ]);

        $user = auth()->user();

        $message = Message::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'status' => $request->status
        ]);

        SubMessage::create([
            'message_id' => $message->id,
            'user_id' => $user->id,
            'context' => $request->context,
        ]);

        return response()->json($message, 201);
    }

    public function update(Request $request, Message $message){
        $request->validate([
            'status' => 'required',
//            'context' => 'required',
        ]);

    }

    public function destroy(Message $message)
    {
        $message = Message::findOrFail($message);
        $message->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
