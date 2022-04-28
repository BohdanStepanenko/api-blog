<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $attr = $request->validated();

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return response(['token' => $user->createToken('tokens')->plainTextToken]);
    }

    public function login(LoginRequest $request)
    {
        $attr = $request->validated();

        if (!Auth::attempt($attr)) {
            return response(['error' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }

        return response(['token' => auth()->user()->createToken('tokens')->plainTextToken]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response(['message' => 'Success'], Response::HTTP_OK);
    }
}
