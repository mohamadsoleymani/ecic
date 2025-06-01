<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return Ticket::with('user')->latest()->get();
    }

    public function show(Ticket $ticket)
    {
        return Ticket::with('user')->findOrFail($ticket);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'status' => 'required|string',
            'importance' => 'required|string',
        ]);

        $ticket = Ticket::create($request->only('user_id', 'title', 'status', 'importance'));

        return response()->json($ticket, 201);
    }

    public function update(Request $request,Ticket $ticket)
    {
        $ticket = Ticket::findOrFail($ticket);
        $ticket->update($request->only('status', 'importance'));

        return response()->json($ticket);
    }

    public function destroy(Ticket $ticket)
    {
        $ticket = Ticket::findOrFail($ticket);
        $ticket->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
