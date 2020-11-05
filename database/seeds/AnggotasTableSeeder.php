<?php

use Illuminate\Database\Seeder;

class AnggotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota::insert([
            [
              'id'              => 1,
              'no_identitas'	  => 10000353,
              'nama' 			      => 'Mr. Admin',
              'no_telp'         => '089872658',
              'tempat_lahir'	  => 'Samarinda',
              'tgl_lahir'		    => '2005-12-29',
              'jk'				      => 'L',
              'alamat'          => 'jalan anggur',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			      => 2,
              'no_identitas'		=> 10000375,
              'nama' 			      => 'Mrs. User',
              'no_telp'         => '08987265876',
              'tempat_lahir'	  => 'Samarinda',
              'tgl_lahir'		    => '2003-09-10',
              'jk'				      => 'P',
              'alamat'          => 'jalan semangka',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
