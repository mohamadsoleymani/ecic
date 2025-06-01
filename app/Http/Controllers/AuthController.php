<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'mobile'   => 'required|string|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'       => $request->name,
            'mobile'     => $request->mobile,
            'password'   => bcrypt($request->password),
            'base_role'  => 'client', // پیش‌فرض نقش client
            'status'     => 'active',
        ]);

        $user->assignRole('client'); // با Spatie

        return response()->json(['message' => 'ثبت نام با موفقیت انجام شد.'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile'   => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'mobile' => ['اطلاعات وارد شده صحیح نیست.'],
            ]);
        }

        $token = $user->createToken('auth_token')->accessToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user
        ]);
    }
}

