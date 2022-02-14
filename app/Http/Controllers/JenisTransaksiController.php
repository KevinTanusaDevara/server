<?php

namespace App\Http\Controllers;

use App\JenisTransaksi;
use Illuminate\Http\Request;

class JenisTransaksiController extends Controller
{
    public function index()
    {
        return JenisTransaksi::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required|unique:jenis_transaksis',
        ]);

        $jenistransaksi = JenisTransaksi::create($request->all());

        return response()->json([
            'status'    => 'success',
            'jenis_transaksi' => $jenistransaksi
        ]);
    }

    public function show($id)
    {
        return JenisTransaksi::find($id);
    }

    public function update(Request $request, $id)
    {
        $jenisTransaksi = JenisTransaksi::find($id);

        $request->validate([
            'jenis_transaksi' => 'required|unique:jenis_transaksis',
        ]);

        $jenisTransaksi->update($request->all());

        return response()->json([
            'status'    => 'success',
            'jenis_transaksi' => $jenistransaksi
        ]);
    }

    public function destroy($id)
    {
        $jenisTransaksi = JenisTransaksi::destroy($id);

        return response()->json([
            'status'    => 'success',
            'jenis_transaksi' => $jenistransaksi
        ]);
    }

    public function search($name)
    {
        return JenisTransaksi::where('jenis_transaksi', 'like', '%'.$name.'%')->get();
    }
}
