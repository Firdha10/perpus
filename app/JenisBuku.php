<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBuku extends Model
{
    protected $table = 'penerbits';
    protected $fillable = ['jenis_buku'];

    public function jeniss()
    {
    	return $this->hasMany(Buku::class);
    }
}
