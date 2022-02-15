<?php

namespace App;

use App\Transaksi;
use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    protected $fillable = [
        'status_pembayaran'
    ];

    public function transaksis()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
