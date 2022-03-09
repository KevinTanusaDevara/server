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
            ->select(DB::raw('transaksis.id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
            transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
            status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
            transaksis.updated_at'))
            ->where('deleted_at', null)
            ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.id')
            ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.id')
            ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->orderBy('tanggal_transaksi', 'DESC')->get();
    }

    public function store(Request $request)
    {
        if ($request['bukti_pembayaran'] == null) {
            $request->validate([
                'tanggal_transaksi'     => 'required',
                'jenis_transaksi'       => 'required',
                'nominal_transaksi'     => 'required',
                'keterangan_transaksi'  => 'required',
                'status_pembayaran'     => 'required',
                'user_id'               => 'required'
            ]);

            $data = Transaksi::create([
                'tanggal_transaksi'     => $request['tanggal_transaksi'],
                'jenis_transaksi_id'    => $request['jenis_transaksi'],
                'nominal_transaksi'     => $request['nominal_transaksi'],
                'keterangan_transaksi'  => $request['keterangan_transaksi'],
                'status_pembayaran_id'  => $request['status_pembayaran'],
                'bukti_pembayaran_id'   => '1',
                'user_id'               => $request['user_id']
            ]);
        }

        else {
            $request->validate([
                'tanggal_transaksi'     => 'required',
                'jenis_transaksi'       => 'required',
                'nominal_transaksi'     => 'required',
                'keterangan_transaksi'  => 'required',
                'status_pembayaran'     => 'required',
                'bukti_pembayaran'      => 'required',
                'user_id'               => 'required'
            ]);
    
            $data = Transaksi::create([
                'tanggal_transaksi'     => $request['tanggal_transaksi'],
                'jenis_transaksi_id'    => $request['jenis_transaksi'],
                'nominal_transaksi'     => $request['nominal_transaksi'],
                'keterangan_transaksi'  => $request['keterangan_transaksi'],
                'status_pembayaran_id'  => $request['status_pembayaran'],
                'bukti_pembayaran_id'   => $request['bukti_pembayaran'],
                'user_id'               => $request['user_id']
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function show($id)
    {
        if($data = Transaksi::find($id) == null)
        {
            return response()->json([
                'status'    => 'success',
                'data'      => null
            ]);
        }

        return $transaction = DB::table('transaksis')
            ->select(DB::raw('transaksis.id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
            transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
            status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
            transaksis.updated_at'))
            ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.id')
            ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.id')
            ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->where('deleted_at', null)
            ->where('transaksis.id', '=', $id)
            ->orderBy('tanggal_transaksi', 'DESC')->get();
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        if ($request['nominal_transaksi']|$request['bukti_transaki'] == null) {
            $request->validate([
                'tanggal_transaksi'     => 'required',
                'jenis_transaksi_id'    => 'required',
                'keterangan_transaksi'  => 'required',
                'status_pembayaran_id'  => 'required',
                'user_id'               => 'required'
            ]);

            $data->update([
                'tanggal_transaksi'     => $request['tanggal_transaksi'],
                'jenis_transaksi_id'    => $request['jenis_transaksi'],
                'keterangan_transaksi'  => $request['keterangan_transaksi'],
                'status_pembayaran_id'  => $request['status_pembayaran'],
                'user_id'               => $request['user_id']
            ]);
        }

        elseif ($request['bukti_transaksi'] == null) {
            $request->validate([
                'tanggal_transaksi'     => 'required',
                'jenis_transaksi_id'    => 'required',
                'nominal_transaksi'     => 'required',
                'keterangan_transaksi'  => 'required',
                'status_pembayaran_id'  => 'required',
                'user_id'               => 'required'
            ]);

            $data->update([
                'tanggal_transaksi'     => $request['tanggal_transaksi'],
                'jenis_transaksi_id'    => $request['jenis_transaksi'],
                'nominal_transaksi'     => $request['nominal_transaksi'],
                'keterangan_transaksi'  => $request['keterangan_transaksi'],
                'status_pembayaran_id'  => $request['status_pembayaran'],
                'user_id'               => $request['user_id']
            ]);
        }

        else {
            $request->validate([
                'tanggal_transaksi'     => 'required',
                'jenis_transaksi_id'    => 'required',
                'nominal_transaksi'     => 'required',
                'keterangan_transaksi'  => 'required',
                'status_pembayaran_id'  => 'required',
                'bukti_pembayaran'      => 'required',
                'user_id'               => 'required'
            ]);

            $data->update([
                'tanggal_transaksi'     => $request['tanggal_transaksi'],
                'jenis_transaksi_id'    => $request['jenis_transaksi'],
                'nominal_transaksi'     => $request['nominal_transaksi'],
                'keterangan_transaksi'  => $request['keterangan_transaksi'],
                'status_pembayaran_id'  => $request['status_pembayaran'],
                'bukti_pembayaran_id'   => $request['bukti_pembayaran'],
                'user_id'               => $request['user_id']
            ]);
        }
    
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function destroy($id)
    {
        $data = Transaksi::destroy($id);

        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }

    public function search($name)
    {
        $data = DB::table('transaksis')
            ->select(DB::raw('transaksis.id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
            transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
            status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
            transaksis.updated_at'))
            ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.id')
            ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.id')
            ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->where('deleted_at', null)
            ->where('tanggal_transaksi', 'like', '%'.$name.'%')
            ->orderBy('tanggal_transaksi', 'DESC')->get();

            return response()->json([
                'status'    => 'success',
                'data'      => $data
            ]);
    }

    public function searchPeriod(Request $request)
    {
        $fromDate = $request->get("fromDate");

        $toDate = $request->get("toDate");

        $data = DB::table('transaksis')
            ->select(DB::raw('transaksis.id, transaksis.tanggal_transaksi, jenis_transaksis.jenis_transaksi, 
            transaksis.nominal_transaksi, transaksis.keterangan_transaksi, bukti_pembayarans.bukti_pembayaran, 
            status_pembayarans.status_pembayaran, users.email, transaksis.deleted_at, transaksis.created_at, 
            transaksis.updated_at'))
            ->join('jenis_transaksis', 'transaksis.jenis_transaksi_id', '=', 'jenis_transaksis.id')
            ->join('status_pembayarans', 'transaksis.status_pembayaran_id', '=', 'status_pembayarans.id')
            ->join('bukti_pembayarans', 'transaksis.bukti_pembayaran_id', '=', 'bukti_pembayarans.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->where('deleted_at', null)
            ->where('tanggal_transaksi', '>=', $fromDate)
            ->where('tanggal_transaksi', '<=', $toDate)
            ->orderBy('tanggal_transaksi', 'DESC')->get();
;
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ]);
    }
}
