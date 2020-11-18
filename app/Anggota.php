<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table = 'anggota';
    protected $fillable = ['no_identitas', 'nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'no_telp', 'alamat'];


    /**
     * Method One To One 
     */

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
    
    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
}
