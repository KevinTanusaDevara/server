<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function profile(Request $request, $id)
    {
        return $user = DB::table('users')
        ->select(DB::raw('users.user_id, users.name, users.email, users.password, roles.role'))
        ->join('roles', 'users.role_id', '=', 'roles.role_id')->get();
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required|confirmed',
            'role_id'   => 'required'
        ]);

        $user->update($request->all());

        return response()->json([
            'status'    => 'success',
            'user'      => $user
        ]);
    }
}
