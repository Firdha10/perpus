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
              'id'  			=> 1,
              'user_id'  		=> 1,
              'no_identitas'				=> 10000353,
              'nama' 			=> 'Mr. Admin',
              'tempat_lahir'	=> 'Samarinda',
              'tgl_lahir'		=> '2005-12-29',
              'jk'				=> 'L',
              'jurusan_id'			=> 1,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'user_id'  		=> 2,
              'no_identitas'				=> 10000375,
              'nama' 			=> 'Mrs. User',
              'tempat_lahir'	=> 'Samarinda',
              'tgl_lahir'		=> '2003-09-10',
              'jk'				=> 'P',
              'jurusan_id'			=> 2,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
