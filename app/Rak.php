<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'raks';
    protected $fillable = ['lokasi'];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'lokasi');
    }
}
    