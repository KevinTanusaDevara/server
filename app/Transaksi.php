<?php

namespace App;

use App\JenisTransaksi;
use App\BuktiPembayaran;
use App\StatusPembayaran;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tanggal_transaksi',
        'jenis_transaksi_id',
        'nominal_transaksi',
        'keterangan_transaksi',
        'bukti_pembayaran_id',
        'status_pembayaran_id',
        'user_id'
    ];

    public function jenis_transaksis()
    {
        return $this->hasMany(JenisTransaksi::class);
    }
    
    public function bukti_pembayaran()
    {
        return $this->hasMany(BuktiPembayaran::class);
    }

    public function status_pembayaran()
    {
        return $this->hasMany(StatusPembayaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
