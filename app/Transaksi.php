<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['kode_transaksi', 'anggota_id', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class, 'anggota_id');
    }
    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
