<?php

use App\Repositories\CsvSeeder;

class FaqsSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'faqs';
        $this->filename = base_path().'/database/seeds/faqs_seeder.csv';
    }

    public function run()
    {
        DB::disableQueryLog(); //jk besar pastikan pakai diSableQueryLog
        //DB::table($this->table)->truncate();
        parent::run();
    }
}

