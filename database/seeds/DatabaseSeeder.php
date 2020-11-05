<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AnggotasTableSeeder::class);
        $this->call(FaqsSeeder::class);
        $this->call(RaksTableSeeder::class);
        $this->call(PengarangTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BukusTableSeeder::class);
    }
}
