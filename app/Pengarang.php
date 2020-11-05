<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    protected $table = 'pengarangs';
    protected $fillable = ['nama'];

    public function pengarangs()
    {
    	return $this->hasMany(Buku::class);
    }

}
