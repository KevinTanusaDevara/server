<?php

namespace App;

use App\Transaksi;
use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    protected $fillable = [
        'jenis_transaksi'
    ];

    public function transaksis()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
