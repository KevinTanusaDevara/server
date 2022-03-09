<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile(Request $request, $id)
    {
        if($data = User::find($id) == null)
        {
            return response()->json([
                'status'    => 'success',
                'data'      => null
            ]);
        }

        $data = DB::table('users')
        ->select(DB::raw('users.id, users.name, users.email, users.password, roles.role, users.updated_at'))
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('users.id', '=', $id)->get();

        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name'      => 'required',
            'role_id'   => 'required',
            'password'  => 'required|confirmed',
        ]);

        $user->update([
            'name'      => $request['name'],
            'password'  => bcrypt($request['password']),
            'role_id'   => $request['role_id']
        ]);

        return response()->json([
            'status'    => 'success',
            'user'      => $user
        ]);
    }
}
