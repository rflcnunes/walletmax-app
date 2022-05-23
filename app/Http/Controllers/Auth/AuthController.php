<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->all(['email', 'password']);

        $token = auth('api')->attempt($credentials);

        if($token) {
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Invalid credentials. Try again.'], 403);
        }
    }

    public function logout()
    {
        return 'logout';
    }

    public function refresh()
    {
        return 'refresh';
    }

    public function home()
    {
        return 'home';
    }
}
