<?php

namespace App;

use App\Transaksi;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    protected $fillable = [
        'bukti_pembayaran'
    ];

    public function transaksis()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
