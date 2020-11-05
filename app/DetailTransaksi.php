<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detailtransaksi';
    protected $fillable = ['transaksi_id', 'buku_id'];

    public function transaksis() 
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
    public function buku() 
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
