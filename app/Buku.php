<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['jumlah_buku','judul', 'isbn', 'penerbit_id', 'pengarang_id', 'tahun_terbit', 'rak_id', 'jenis_id','deskripsi', 'cover'];

    /**
     * Method One To Many 
     */
    public function details()
    {
    	return $this->hasMany(DetailTransaksi::class);
    }
    public function rak() 
    {
        return $this->belongsTo(Rak::class, 'rak_id');
    }
    public function penerbit() 
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id');
    }
    public function pengarang() 
    {
        return $this->belongsTo(Pengarang::class, 'pengarang_id');
    }
    public function jenis() 
    {
        return $this->belongsTo(JenisBuku::class, 'jenis_id');
    }
}
