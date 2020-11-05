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
                  'nama'  	    => 'Erlangga',
                  'created_at'    => \Carbon\Carbon::now(),
                  'updated_at'    => \Carbon\Carbon::now()
              ],
              [
                  'id'  			=> 2,
                  'nama'  	    => 'Grasindo',
                  'created_at'    => \Carbon\Carbon::now(),
                  'updated_at'    => \Carbon\Carbon::now()
              ],
              [
                  'id'  			=> 3,
                  'nama'  	    => 'Platinum',
                  'created_at'    => \Carbon\Carbon::now(),
                  'updated_at'    => \Carbon\Carbon::now()
              ],
          ]);
    }
}
