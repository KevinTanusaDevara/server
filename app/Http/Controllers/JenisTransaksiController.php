<?php

namespace App\Http\Controllers;

use App\JenisTransaksi;
use Illuminate\Http\Request;

class JenisTransaksiController extends Controller
{
    public function index()
    {
        $data = JenisTransaksi::all();
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required|unique:jenis_transaksis',
        ]);

        $data = JenisTransaksi::create($request->all());

        return response()->json([
            'status'    => 'success',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data = JenisTransaksi::find($id);
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = JenisTransaksi::find($id);

        $request->validate([
            'jenis_transaksi' => 'required|unique:jenis_transaksis',
        ]);

        $data->update($request->all());

        return response()->json([
            'status'    => 'success',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data = JenisTransaksi::destroy($id);

        return response()->json([
            'status'    => 'success',
            'data' => $data
        ]);
    }

    public function search($name)
    {
        $data = JenisTransaksi::where('jenis_transaksi', 'like', '%'.$name.'%')->get();
        return response()->json([
            'status'    => 'success',
            'data' => $data
        ]);
    }
}
