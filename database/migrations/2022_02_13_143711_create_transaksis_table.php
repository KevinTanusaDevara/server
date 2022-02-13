<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('transaksi_id');
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('jenis_transaksi_id');
            $table->string('nominal_transaksi');
            $table->string('keterangan_transaksi');
            $table->unsignedBigInteger('bukti_pembayaran_id')->nullable();
            $table->unsignedBigInteger('status_pembayaran_id');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('jenis_transaksi_id')->references('jenis_transaksi_id')->on('jenis_transaksis');
            $table->foreign('bukti_pembayaran_id')->references('bukti_pembayaran_id')->on('bukti_pembayarans');
            $table->foreign('status_pembayaran_id')->references('status_pembayaran_id')->on('status_pembayarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
