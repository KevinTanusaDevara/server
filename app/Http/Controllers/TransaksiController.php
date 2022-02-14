<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        return $transaction = DB::table('transaksis')
        ->select(DB::raw('transaksis.transaksi_id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
        transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
        status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
        transaksis.updated_at'))
        ->where('deleted_at', null)
        ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.jenis_transaksi_id')
        ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.bukti_pembayaran_id')
        ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.status_pembayaran_id')
        ->join('users', 'transaksis.user_id', '=', 'users.user_id')
        ->orderBy('tanggal_transaksi', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'tanggal_transaksi'     => 'required',
            'jenis_transaksi_id'    => 'required',
            'nominal_transaksi'     => 'required',
            'keterangan_transaksi'  => 'required',
            'status_pembayaran_id'  => 'required',
            'user_id'               => 'required'
        ]);

        $transaksi = Transaksi::create([
            'tanggal_transaksi'     => $validator['tanggal_transaksi'],
            'jenis_transaksi_id'    => $validator['jenis_transaksi_id'],
            'nominal_transaksi'     => $validator['nominal_transaksi'],
            'keterangan_transaksi'  => $validator['keterangan_transaksi'],
            'status_pembayaran_id'  => $validator['status_pembayaran_id'],
            'user_id'               => $validator['user_id']
        ]);

        return response()->json([
            'status'    => 'success',
            'transaksi' => $transaksi
        ]);
    }

    public function show($id)
    {
        return $transaction = DB::table('transaksis')
        ->select(DB::raw('transaksis.transaksi_id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
        transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
        status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
        transaksis.updated_at'))
        ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.jenis_transaksi_id')
        ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.bukti_pembayaran_id')
        ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.status_pembayaran_id')
        ->join('users', 'transaksis.user_id', '=', 'users.user_id')
        ->where('deleted_at', null)
        ->where('transaksi_id', '=', $id)
        ->orderBy('tanggal_transaksi', 'DESC')->get();
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $request->validate([
            'tanggal_transaksi'     => 'required',
            'jenis_transaksi_id'    => 'required',
            'nominal_transaksi'     => 'required',
            'keterangan_transaksi'  => 'required',
            'status_pembayaran_id'  => 'required',
            'user_id'               => 'required'
        ]);

        $transaksi->update($request->all());

        return response()->json([
            'status'    => 'success',
            'transaksi' => $transaksi
        ]);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::destroy($id);

        return response()->json([
            'status'    => 'success',
            'transaksi' => $transaksi
        ]);
    }

    public function search($name)
    {
        return $transaction = DB::table('transaksis')
        ->select(DB::raw('transaksis.transaksi_id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
        transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
        status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
        transaksis.updated_at'))
        ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.jenis_transaksi_id')
        ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.bukti_pembayaran_id')
        ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.status_pembayaran_id')
        ->join('users', 'transaksis.user_id', '=', 'users.user_id')
        ->where('deleted_at', null)
        ->where('tanggal_transaksi', 'like', '%'.$name.'%')
        ->orderBy('tanggal_transaksi', 'DESC')->get();
    }

    public function searchPeriod(Request $request)
    {
        $fromDate = $request->get("fromDate");

        $toDate = $request->get("toDate");

        $transaction = DB::table('transaksis')
        ->select(DB::raw('transaksis.transaksi_id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
        transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
        status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
        transaksis.updated_at'))
        ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.jenis_transaksi_id')
        ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.bukti_pembayaran_id')
        ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.status_pembayaran_id')
        ->join('users', 'transaksis.user_id', '=', 'users.user_id')
        ->where('deleted_at', null)
        ->where('tanggal_transaksi', '>=', $fromDate)
        ->where('tanggal_transaksi', '<=', $toDate)
        ->orderBy('tanggal_transaksi', 'DESC')->get();
;
        return response()->json([
            'status'    => 'success',
            'transaksi'      => $transaction
        ]);
    }
}
