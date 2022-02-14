<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user = User::where('email', $validator['email'])->first();

        if(!$user || !Hash::check($validator['password'], $user->password))
        {
            return response()->json([
                'status'    => 'fails',
                'message'   => 'Invalid Credintials'
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'user'      => $user
        ]);
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email',
            'password'  => 'required|confirmed',
            'role_id'   => 'required'
        ]);

        $user = User::create([
            'name'      => $validator['name'],
            'email'     => $validator['email'],
            'password'  => bcrypt($validator['password']),
            'role_id'   => $validator['role_id']
        ]);

        return response()->json([
            'status'    => 'success',
            'user'      => $user
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'status'    => 'success',
            'message'   => 'logged out'
        ]);
    }
}
