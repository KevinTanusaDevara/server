<?php

use Illuminate\Database\Seeder;

class BuktiPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bukti_pembayarans')->insert([
            'bukti_pembayaran' => 'Belum Ada Bukti Pembayaran'
        ]);
    }
}
