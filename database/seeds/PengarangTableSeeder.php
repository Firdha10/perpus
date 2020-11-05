<?php

use Illuminate\Database\Seeder;

class PengarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Pengarang::insert([
          [
              'id'  			=> 1,
              'nama'  	    => 'Amir',
              'created_at'    => \Carbon\Carbon::now(),
              'updated_at'    => \Carbon\Carbon::now()
          ],
          [
              'id'  			=> 2,
              'nama'  	    => 'Shani',
              'created_at'    => \Carbon\Carbon::now(),
              'updated_at'    => \Carbon\Carbon::now()
          ],
          [
              'id'  			=> 3,
              'nama'  	    => 'Cindy',
              'created_at'    => \Carbon\Carbon::now(),
              'updated_at'    => \Carbon\Carbon::now()
          ],
      ]);
    }
}
