<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_transaksis')->insert([
            'jenis_transaksi'   => 'Pemasukan',
        ]);
        DB::table('jenis_transaksis')->insert([
            'jenis_transaksi'   => 'Pengeluaran',
        ]);
        DB::table('jenis_transaksis')->insert([
            'jenis_transaksi'   => 'Beban',
        ]);
    }
}
