<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:roles',
        ]);

        return Role::create($request->all());
    }

    public function show($id)
    {
        return Role::find($id);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $request->validate([
            'role' => 'required|unique:roles',
        ]);
        $role->update($request->all());
        return $role;
    }

    public function destroy($id)
    {
        return Role::destroy($id);
    }

    public function search($name)
    {
        return Role::where('role', 'like', '%'.$name.'%')->get();
    }
}
