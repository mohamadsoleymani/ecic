<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string|unique:users,mobile',
            'password' => 'required|min:6',
            'status' => 'required|in:active,inactive',
            'base_role' => 'required|string',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);


        return response()->json(User::all());

    }

    public function show(User $user)
    {

        $user = User::findOrFail($user);
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'mobile' => 'sometimes|string|unique:users,mobile,',
            'password' => 'nullable|min:6',
            'status' => 'in:active,inactive',
            'base_role' => 'sometimes|string',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user = User::findOrFail($user);
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
