<?php

namespace App\Http\Controllers;

use App\StatusPembayaran;
use Illuminate\Http\Request;

class StatusPembayaranController extends Controller
{
    public function index()
    {
        $data = StatusPembayaran::all();
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_pembayaran' => 'required|unique:status_pembayarans',
        ]);

        $data = StatusPembayaran::create($request->all());
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function show($id)
    {
        $data = StatusPembayaran::find($id);
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = StatusPembayaran::find($id);
        $request->validate([
            'status_pembayaran' => 'required|unique:status_pembayarans',
        ]);

        $data->update($request->all());
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function destroy($id)
    {
        $data = StatusPembayaran::destroy($id);
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function search($name)
    {
        $data = StatusPembayaran::where('status_pembayaran', 'like', '%'.$name.'%')->get();
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }
}
