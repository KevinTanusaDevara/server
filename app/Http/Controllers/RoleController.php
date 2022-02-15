<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::all();
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:roles',
        ]);

        $data = Role::create($request->all());
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function show($id)
    {
        $data = Role::find($id);
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $request->validate([
            'role' => 'required|unique:roles',
        ]);
        $role->update($request->all());
        return response()->json([
            'status'    => 'success',
            'data'      => $role
        ]);
    }

    public function destroy($id)
    {
        $data = Role::destroy($id);
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function search($name)
    {
        $data = Role::where('role', 'like', '%'.$name.'%')->get();
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }
}
