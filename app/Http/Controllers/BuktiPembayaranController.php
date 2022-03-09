<?php

namespace App\Http\Controllers;

use App\BuktiPembayaran;
use Illuminate\Http\Request;

class BuktiPembayaranController extends Controller
{
    public function index()
    {
        $data = BuktiPembayaran::all();
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|unique:bukti_pembayarans',
        ]);

        $data = BuktiPembayaran::create($request->all());
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function show($id)
    {
        $data = BuktiPembayaran::find($id);
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = BuktiPembayaran::find($id);

        $request->validate([
            'bukti_pembayaran' => 'required|unique:bukti_pembayarans',
        ]);

        $data->update($request->all());
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function destroy($id)
    {
        $data = BuktiPembayaran::destroy($id);
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function search($name)
    {
        $data = BuktiPembayaran::where('bukti_pembayaran', 'like', '%'.$name.'%')->get();
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }
}
