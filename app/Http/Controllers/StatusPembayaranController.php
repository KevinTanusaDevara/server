<?php

namespace App\Http\Controllers;

use App\StatusPembayaran;
use Illuminate\Http\Request;

class StatusPembayaranController extends Controller
{
    public function index()
    {
        return StatusPembayaran::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_pembayaran' => 'required|unique:status_pembayarans',
        ]);

        return StatusPembayaran::create($request->all());
    }

    public function show($id)
    {
        return StatusPembayaran::find($id);
    }

    public function update(Request $request, $id)
    {
        $statusPembayaran = StatusPembayaran::find($id);
        $request->validate([
            'status_pembayaran' => 'required|unique:status_pembayarans',
        ]);
        $statusPembayaran->update($request->all());
        return $statusPembayaran;
    }

    public function destroy($id)
    {
        return StatusPembayaran::destroy($id);
    }

    public function search($name)
    {
        return StatusPembayaran::where('status_pembayaran', 'like', '%'.$name.'%')->get();
    }
}
