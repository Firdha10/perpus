<?php

use Illuminate\Database\Seeder;

class PenerbitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Penerbit::insert([
              [
                  'id'  			=> 1,
                  'penerbit'  	    => 'Erlangga',
                  'created_at'    => \Carbon\Carbon::now(),
                  'updated_at'    => \Carbon\Carbon::now()
              ],
              [
                  'id'  			=> 2,
                  'penerbit'  	    => 'Grasindo',
                  'created_at'    => \Carbon\Carbon::now(),
                  'updated_at'    => \Carbon\Carbon::now()
              ],
              [
                  'id'  			=> 3,
                  'penerbit'  	    => 'Platinum',
                  'created_at'    => \Carbon\Carbon::now(),
                  'updated_at'    => \Carbon\Carbon::now()
              ],
          ]);
    }
}
