<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbits';
    protected $fillable = ['nama'];

    public function penerbits()
    {
    	return $this->hasMany(Buku::class);
    }
}
