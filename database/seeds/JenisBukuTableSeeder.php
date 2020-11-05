<?php

use Illuminate\Database\Seeder;

class JenisBukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\JenisBuku::insert([
            [
                'id'  			=> 1,
                'jenis_buku'  	    => 'novel',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 2,
                'jenis_buku'  	    => 'pelajaran',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 3,
                'jenis_buku'  	    => 'komik',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ],
        ]);
    }
}
