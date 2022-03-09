<?php

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksis')->insert([
            'tanggal_transaksi'     => '2022-1-1',
            'jenis_transaksi_id'    => '1',
            'nominal_transaksi'     => '1000000',
            'keterangan_transaksi'  => 'Pemasukan',
            'bukti_pembayaran_id'   => '1',
            'status_pembayaran_id'  => '1',
            'user_id'               => '1'
        ]);
        DB::table('transaksis')->insert([
            'tanggal_transaksi'     => '2022-1-1',
            'jenis_transaksi_id'    => '2',
            'nominal_transaksi'     => '500000',
            'keterangan_transaksi'  => 'Pengeluaran',
            'bukti_pembayaran_id'   => '1',
            'status_pembayaran_id'  => '1',
            'user_id'               => '1'
        ]);
        DB::table('transaksis')->insert([
            'tanggal_transaksi'     => '2022-1-1',
            'jenis_transaksi_id'    => '3',
            'nominal_transaksi'     => '10000',
            'keterangan_transaksi'  => 'Beban',
            'bukti_pembayaran_id'   => '1',
            'status_pembayaran_id'  => '1',
            'user_id'               => '1'
        ]);
        DB::table('transaksis')->insert([
            'tanggal_transaksi'     => '2022-1-2',
            'jenis_transaksi_id'    => '1',
            'nominal_transaksi'     => '1000000',
            'keterangan_transaksi'  => 'Pemasukan',
            'bukti_pembayaran_id'   => '1',
            'status_pembayaran_id'  => '1',
            'user_id'               => '1'
        ]);
        DB::table('transaksis')->insert([
            'tanggal_transaksi'     => '2022-1-2',
            'jenis_transaksi_id'    => '2',
            'nominal_transaksi'     => '500000',
            'keterangan_transaksi'  => 'Pengeluaran',
            'bukti_pembayaran_id'   => '1',
            'status_pembayaran_id'  => '1',
            'user_id'               => '1'
        ]);
        DB::table('transaksis')->insert([
            'tanggal_transaksi'     => '2022-1-2',
            'jenis_transaksi_id'    => '3',
            'nominal_transaksi'     => '10000',
            'keterangan_transaksi'  => 'Beban',
            'bukti_pembayaran_id'   => '1',
            'status_pembayaran_id'  => '1',
            'user_id'               => '1'
        ]);
    }
}
