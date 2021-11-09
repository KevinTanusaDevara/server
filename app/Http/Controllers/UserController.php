<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
            'email'     => 'required|string|email|unique:users',
            'password'  => 'required|string|confirmed|min:5',
        ]);     

        if($validator->fails())
        {
            return response()->json([
                'message' => 'Register Gagal!',
                'validator' => $validator->errors()
            ]);
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);

        $user->save();

        return response()->json([
            'message' => 'Register Berhasil!',
            'user'    => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|string|email',
            'password'  => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ], 404);
        }

        $user = User::find(Auth::user()->id);

        return response()->json([
            'message' => 'Login Berhasil',
            'user'    => $user
        ], 200);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'Logout Berhasil!'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
