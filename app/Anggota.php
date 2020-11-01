<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table = 'anggota';
    protected $fillable = ['user_id', 'no_identitas', 'nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'jurusan_id'];


    /**
     * Method One To One 
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function jurusan() 
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
