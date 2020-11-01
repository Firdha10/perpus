<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public $timestamps = true;
    protected $table = 'jurusans';
    protected $fillable = ['jurusan'];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
