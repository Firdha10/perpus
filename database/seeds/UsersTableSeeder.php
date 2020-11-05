<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\User::insert([
            [
              'id'            => 1,
              'email' 			  => 'admin@perpus.com',
              'password'		  => bcrypt('123123'),
              'gambar'			  => NULL,
              'level'			    => 'admin',
              'anggota_id'    => 1,
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'email' 			=> 'user@perpus.com',
              'password'		=> bcrypt('123123'),
              'gambar'			=> NULL,
              'level'			=> 'user',
              'anggota_id'    => 2,
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
