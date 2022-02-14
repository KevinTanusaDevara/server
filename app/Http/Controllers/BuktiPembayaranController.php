<?php

namespace App\Http\Controllers;

use App\BuktiPembayaran;
use Illuminate\Http\Request;

class BuktiPembayaranController extends Controller
{
    public function index()
    {
        return BuktiPembayaran::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|unique:bukti_pembayarans',
        ]);

        return BuktiPembayaran::create($request->all());
    }

    public function show($id)
    {
        return BuktiPembayaran::find($id);
    }

    public function update(Request $request, $id)
    {
        $buktiPembayaran = BuktiPembayaran::find($id);
        $request->validate([
            'bukti_pembayaran' => 'required|unique:bukti_pembayarans',
        ]);
        $buktiPembayaran->update($request->all());
        return $buktiPembayaran;
    }

    public function destroy($id)
    {
        return BuktiPembayaran::destroy($id);
    }

    public function search($name)
    {
        return BuktiPembayaran::where('bukti_pembayaran', 'like', '%'.$name.'%')->get();
    }
}
